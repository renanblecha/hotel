@extends('layouts.app')

@section('site_title',__("Edit Hotel"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("Edit Hotel")}}</h3>
        <div class="container">
            <div class="row">
                <form class="w-100" action="{{route('gerencia.hotel.atualizar',$registro->id)}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    @include('paginas.hotel._form')
                    <button class="btn btn-primary" type="submit">{{__("Refresh")}}</button>
                </form>
            </div>
        </div>
    </div>


@endsection
