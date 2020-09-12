@extends('layouts.app')

@section('site_title',__("List of Books"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("List of Books")}}</h3>

        <div class="container">
            <div class="row">
                <div class="w-100 text-right">
                    <a class="btn btn-primary mb-1" href="{{ route('gerencia.reserva.adicionar') }}">{{__("New")}}</a>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__("Guest")}}</th>
                        <th>{{__("Hotel")}}</th>
                        <th>{{__("Room")}}</th>
                        <th>{{__("Category")}}</th>
                        <th>{{__("Start")}}</th>
                        <th>{{__("End")}}</th>
                        <th class="text-right">{{__("Action")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->pessoa->nome }} {{$registro->pessoa->sobrenome}}</td>
                            <td>{{ $registro->hotelsHasQuartosHasCategoria->hotel->nome}}</td>
                            <td>{{ $registro->hotelsHasQuartosHasCategoria->quarto->nome}}</td>
                            <td>{{ $registro->hotelsHasQuartosHasCategoria->categoria->nome}}</td>
                            <td>{{ $registro->data_inicio_decorator }}</td>
                            <td>{{ $registro->data_fim_decorator }}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-danger"
                                   onclick="return confirm('Tem certeza em deletar este item?')"
                                   title="{{__("Delete")}}" href="{{ route('gerencia.reserva.deletar',$registro->id) }}"><i
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

@endsection
