@extends('layouts.app')

@section('site_title',__("New Guest"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("New Guest")}}</h3>
        <div class="container">
            <div class="row">
                <form class="w-100" action="{{route('gerencia.hospede.salvar')}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('paginas.hospede._form')
                    <button class="btn btn-primary" type="submit">{{__("Save")}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
