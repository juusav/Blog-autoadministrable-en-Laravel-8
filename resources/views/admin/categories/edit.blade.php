@extends('adminlte::page')

@section('title', 'Loremket-Admin')

@section('content_header')
    <h1>Editar categoria</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre')!!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría'])!!}

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug  (Esto es lo que aparecerá en la url de tu categoría)')!!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'readOnly'])!!}

                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary'])!!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space:'-'
            });
        });
    </script>
@endsection
