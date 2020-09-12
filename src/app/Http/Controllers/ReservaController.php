<?php

namespace App\Http\Controllers;

use App\HotelsHasQuartosHasCategoria;
use App\Pessoa;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Reserva::paginate(3);
        return view('paginas.reserva.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospedes = Pessoa::all();
        $hotels_has_quartos_has_categorias = HotelsHasQuartosHasCategoria::all();
        return view('paginas.reserva.adicionar', compact(['hospedes','hotels_has_quartos_has_categorias']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'pessoa_id' => 'required|integer',
                'hotels_has_quartos_has_categoria_id' => 'required|integer',
                'data_inicio' => 'required|date_format:Y-m-d',
                'data_fim' => 'required|date_format:Y-m-d',
            ]
        );

        $dados = $request->all();
        $dados['user_id'] = Auth::user()->id;

        Reserva::create($dados);

        Log::info("Reserva efetuada com sucesso pelo usuário #".$dados["user_id"]." para o hóspede #".$dados["pessoa_id"]);

        return redirect()->route('gerencia.reserva');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $registro = Reserva::find($id)->delete();
        return redirect()->route('gerencia.reserva');
    }
}
