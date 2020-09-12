@extends('layouts.app')

@section('site_title',__("Rooms Configurations").": ".$hotel->nome)

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("Rooms Configurations")}}: {{$hotel->nome}}</h3>

        <div class="container">
            <div class="row">
                <div class="w-100 text-right">
                    <a class="btn btn-primary mb-1"
                       href="{{ route('gerencia.hotel.quarto.adicionar', $hotel->id) }}">{{__("New")}}</a>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{__("Hotel")}}</th>
                        <th class="text-center">{{__("Room")}}</th>
                        <th class="text-center">{{__("Category")}}</th>
                        <th class="text-center">{{__("Qty")}}</th>
                        <th class="text-right">{{__("Price")}}</th>
                        <th class="text-right">{{__("Action")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td class="text-center">{{ $registro->id }}</td>
                            <td class="text-center">{{ $registro->hotel->nome }}</td>
                            <td class="text-center">{{ $registro->quarto->nome }}</td>
                            <td class="text-center">{{ $registro->categoria->nome }}</td>
                            <td class="text-center">{{ $registro->quantidade }}</td>
                            <td class="text-right">@money($registro->valor)</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ route('gerencia.hotel.quarto.editar',$registro->id) }}"
                                   title="{{__("Edit")}}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-sm btn-danger"
                                   onclick="return confirm('Tem certeza em deletar este item?')"
                                   title="{{__("Delete")}}"
                                   href="{{ route('gerencia.hotel.quarto.deletar',$registro->id) }}"><i
                                        class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination">
                {{$registros->links()}}
            </ul>
        </div>
    </div>
@endsection
