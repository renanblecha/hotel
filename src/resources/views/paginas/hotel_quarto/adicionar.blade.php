@extends('layouts.app')

@section('site_title',__("New Room Configuration").": ".$hotel->nome)

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("New Room Configuration")}}: {{$hotel->nome}}</h3>
        <div class="container">
            <div class="row">
                <form class="w-100" action="{{route('gerencia.hotel.quarto.salvar', $hotel->id)}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('paginas.hotel_quarto._form')
                    <button class="btn btn-primary" type="submit">{{__("Save")}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
