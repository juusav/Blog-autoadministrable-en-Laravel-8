@extends('adminlte::page')

@section('title', 'Loremket-Admin')

@section('content_header')
    @can('admin.categories.create')
    <a href="{{route('admin.categories.create')}}" class="btn btn-prim btn-secondary btn-sm float-right">Agregar categoría</a>
    @endcan
    <h1>Lista de categorias</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td width="10px">
                                    @can('admin.categories.edit')
                                    <a class="btn btn-warning" href="{{route('admin.categories.edit', $category)}}">Editar</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.categories.destroy')
                                        <form action="{{route('admin.categories.destroy', $category)}}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
@stop
