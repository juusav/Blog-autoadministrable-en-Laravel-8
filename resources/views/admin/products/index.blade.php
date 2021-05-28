@extends('adminlte::page')

@section('title', 'Loremket-Admin')

@section('content_header')
    <a href="{{route('admin.products.create')}}" class="btn btn-secondary btn-sm float-right">
        Publicar nuevo producto
    </a>
    <a href="{{route('admin.products.download')}}" class="btn btn-primary btn-sm float-right">
        Descargar PDF de productos
    </a>
    <h1>Listado de productos</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    @livewire('admin.products-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
