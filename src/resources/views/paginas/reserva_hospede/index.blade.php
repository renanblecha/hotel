@extends('layouts.app')

@section('site_title',__("Guest Reservations"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("Guest Reservations")}}</h3>

        <div class="container">
            <div class="row">
                <div class="w-100 text-right">
                    <a class="btn btn-primary mb-1" href="{{ route('hospede.reserva.adicionar') }}">{{__("New")}}</a>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__("Hotel")}}</th>
                        <th>{{__("Room")}}</th>
                        <th>{{__("Category")}}</th>
                        <th>{{__("Price")}}</th>
                        <th>{{__("Start")}}</th>
                        <th>{{__("End")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->pessoa->nome }} {{$registro->pessoa->sobrenome}}</td>
                            <td>{{ $registro->hotelsHasQuartosHasCategoria->hotel->nome}}</td>
                            <td>{{ $registro->hotelsHasQuartosHasCategoria->quarto->nome}}</td>
                            <td>{{ $registro->hotelsHasQuartosHasCategoria->categoria->nome}}</td>
                            <td>@money($registro->hotelsHasQuartosHasCategoria->valor)</td>
                            <td>{{ $registro->data_inicio_decorator }}</td>
                            <td>{{ $registro->data_fim_decorator }}</td>
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
