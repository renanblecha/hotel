@extends('layouts.app')

@section('site_title',__("List of Categories"))

@section('content')
    <div class="container">
        <h3 class="center mb-3 mt-5">{{__("List of Categories")}}</h3>

        <div class="container">
            <div class="row">
                <div class="w-100 text-right">
                    <a class="btn btn-primary mb-1" href="{{ route('gerencia.categoria.adicionar') }}">{{__("New")}}</a>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__("Name")}}</th>
                        <th class="text-right">{{__("Action")}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            <td>{{ $registro->nome }}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary"
                                   href="{{ route('gerencia.categoria.editar',$registro->id) }}" title="{{__("Edit")}}"><i
                                        class="fa fa-pencil"></i></a>
                                <a class="btn btn-sm btn-danger"
                                   onclick="return confirm('Tem certeza em deletar este item?')"
                                   title="{{__("Delete")}}"
                                   href="{{ route('gerencia.categoria.deletar',$registro->id) }}"><i
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
