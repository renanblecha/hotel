@extends('layouts.app')

@section('site_title',__("Edit User"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("Edit User")}}</h3>
        <div class="container">
            <div class="row">
                <form class="w-100" action="{{route('admin.usuario.atualizar',$registro->id)}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    @include('paginas.usuario._form')
                    <button class="btn btn-primary" type="submit">{{__("Refresh")}}</button>
                </form>
            </div>
        </div>
    </div>


@endsection
