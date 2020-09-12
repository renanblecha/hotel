@extends('layouts.app')

@section('site_title',__("Reservation successful"))

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid bg-success">
            <div class="container">
                <h1 class="display-4 text-center text-white">{{__("Reservation successful")}}</h1>
                <br><br>
                <div class="row">
                    <div class="col-12 col-sm-6 offset-sm-3">
                        <dl class="row text-white">
                            <dt class="col-sm-5 text-right">{{__("Hotel")}}</dt>
                            <dd class="col-sm-7">{{$registro->hotelsHasQuartosHasCategoria->hotel->nome}}</dd>
                            <dt class="col-sm-5 text-right">{{__("Room")}}</dt>
                            <dd class="col-sm-7">{{$registro->hotelsHasQuartosHasCategoria->quarto->nome}}</dd>
                            <dt class="col-sm-5 text-right">{{__("Category")}}</dt>
                            <dd class="col-sm-7">{{$registro->hotelsHasQuartosHasCategoria->categoria->nome}}</dd>
                            <dt class="col-sm-5 text-right">{{__("Price")}}</dt>
                            <dd class="col-sm-7">@money($registro->hotelsHasQuartosHasCategoria->valor)</dd>
                            <dt class="col-sm-5 text-right">{{__("Start")}}</dt>
                            <dd class="col-sm-7">{{$registro->data_inicio_decorator}}</dd>
                            <dt class="col-sm-5 text-right">{{__("End")}}</dt>
                            <dd class="col-sm-7">{{$registro->data_fim_decorator}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
