@extends('layouts.app')

@section('site_title',__("Edit Room"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("Edit Room")}}</h3>
        <div class="container">
            <div class="row">
                <form class="w-100" action="{{route('gerencia.quarto.atualizar',$registro->id)}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    @include('paginas.quarto._form')
                    <button class="btn btn-primary" type="submit">{{__("Refresh")}}</button>
                </form>
            </div>
        </div>
    </div>


@endsection
