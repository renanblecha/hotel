<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Hotel;
use App\HotelsHasQuartosHasCategoria;
use App\Quarto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HotelQuartoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $hotel = Hotel::find($id);
        $registros = HotelsHasQuartosHasCategoria::where('hotel_id', $hotel->id)->paginate(3);
        return view('paginas.hotel_quarto.index', compact(['registros', 'hotel']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $hotel = Hotel::find($id);
        $quartos = Quarto::all();
        $categorias = Categoria::all();
        return view('paginas.hotel_quarto.adicionar', compact(['hotel','quartos','categorias']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $hotel = Hotel::find($id);
        $request->validate(
            [
                'quarto_id' => [
                    'required',
                    'integer',
                    Rule::unique('hotels_has_quartos_has_categorias')->where(function($query) use ($request, $id){
                        return $query
                            ->where('hotel_id', $id)
                            ->where('quarto_id', $request->quarto_id)
                            ->where('categoria_id', $request->categoria_id)
                        ;
                    })
                ],
                'categoria_id' => 'required|integer',
                'quantidade' => 'required|integer',
                'valor' => 'required|numeric',
            ],
            [
                'quarto_id.unique' => __('messages.hotels_has_quartos_has_categorias.error.unique', [
                    'hotel_id'              => $id,
                    'quarto_id'              => $request->quarto_id,
                    'categoria_id'        => $request->categoria_id
                ]),
            ]
        );

        $dados = $request->all();
        $dados['hotel_id'] = $hotel->id;

        HotelsHasQuartosHasCategoria::create($dados);

        return redirect()->route('gerencia.hotel.quarto', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $registro = HotelsHasQuartosHasCategoria::find($id);
        $hotel = Hotel::find($registro->hotel_id);
        $quartos = Quarto::all();
        $categorias = Categoria::all();
        return view('paginas.hotel_quarto.editar', compact(['registro','hotel','quartos','categorias']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $registro = HotelsHasQuartosHasCategoria::find($id);
        $request->validate(
            [
                'quarto_id' => [
                    'required',
                    'integer',
                    Rule::unique('hotels_has_quartos_has_categorias')->where(function($query) use ($request, $registro){
                        return $query
                            ->where('hotel_id', $registro->hotel_id)
                            ->where('quarto_id', $request->quarto_id)
                            ->where('categoria_id', $request->categoria_id)
                            ->where('id', '!=', $registro->id)
                        ;
                    })
                ],
                'categoria_id' => 'required|integer',
                'quantidade' => 'required|integer',
                'valor' => 'required|numeric',
            ],
            [
                'quarto_id.unique' => __('messages.hotels_has_quartos_has_categorias.error.unique', [
                    'hotel_id'              => $registro->hotel->id,
                    'quarto_id'              => $request->quarto_id,
                    'categoria_id'        => $request->categoria_id
                ]),
            ]
        );

        $dados = $request->all();
        $dados['hotel_id'] = $registro->hotel->id;

        HotelsHasQuartosHasCategoria::find($id)->update($dados);

        return redirect()->route('gerencia.hotel.quarto', $registro->hotel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $registro = HotelsHasQuartosHasCategoria::find($id)->delete();
        return redirect()->route('gerencia.hotel.quarto', $registro->hotel->id);
    }
}
