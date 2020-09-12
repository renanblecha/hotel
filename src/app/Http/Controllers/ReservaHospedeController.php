<?php

namespace App\Http\Controllers;

use App\HotelsHasQuartosHasCategoria;
use App\Pessoa;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ReservaHospedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoa = Pessoa::where("user_id", Auth::user()->id)->first();
        $registros = Reserva::where("pessoa_id", $pessoa->id)->paginate(3);
        return view('paginas.reserva_hospede.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels_has_quartos_has_categorias = HotelsHasQuartosHasCategoria::all();
        return view('paginas.reserva_hospede.adicionar', compact(['hotels_has_quartos_has_categorias']));
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
                'hotels_has_quartos_has_categoria_id' => 'required|integer',
                'data_inicio' => 'required|date_format:Y-m-d',
                'data_fim' => 'required|date_format:Y-m-d',
            ]
        );

        $dados = $request->all();
        $pessoa = Pessoa::where("user_id", Auth::user()->id)->first();
        $dados['pessoa_id'] =  $pessoa->id;
        $dados['user_id'] = Auth::user()->id;

        $reserva = Reserva::create($dados);

        Log::info("Reserva efetuada com sucesso pelo usuário #".$dados["user_id"]." para o hóspede (ele mesmo) #".$dados["pessoa_id"]);

        return redirect()->route('hospede.reserva.ver', $reserva->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $registro = Reserva::find($id);
        return view('paginas.reserva_hospede.show', compact(['registro']));
    }
}
