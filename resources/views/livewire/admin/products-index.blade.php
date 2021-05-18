<div class="card">
    <div class="card-header">
        <input wire:model="search" placeholder="Buscar producto" class="form-control">
    </div>

    {{-- El siguiente condicional me permite mostrar los resultados buscados por el admin y de lo contrario se mostrara un mensaje.   --}}
    @if ($products->count())

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.products.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$products->links()}}
        </div>
    
    @else
        <div class="card-body">
            <strong>No existe ningún registro...</strong>
        </div>            
    @endif
</div>