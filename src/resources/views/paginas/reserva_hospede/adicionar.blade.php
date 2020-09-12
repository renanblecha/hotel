@extends('layouts.app')

@section('site_title',__("New Book"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("New Book")}}</h3>
        <div class="container">
            <div class="row">
                <form class="w-100" action="{{route('hospede.reserva.salvar')}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('paginas.reserva_hospede._form')
                    <button class="btn btn-primary" type="submit">{{__("Save")}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
