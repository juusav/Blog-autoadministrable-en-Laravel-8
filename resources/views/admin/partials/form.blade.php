<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}        
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la nueva etiqueta']) !!}        

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!!Form::label('slug', 'slug')!!}        
    {!!Form::text('slug', null, ['class' => 'form-control', 'readOnly'])!!}        
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {{-- <label for="">Color:</label>
    <select name="color" id="" class="form-control">
        <option value="red">Color rojo</option>
        <option value="green">Color verde</option>
        <option value="yellow" selected>Color amarillo</option>
    </select> --}}
    {!! Form::label('color', 'Color:') !!}        
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

    @error('color')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
