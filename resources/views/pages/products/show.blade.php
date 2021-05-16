<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-blond text-gray-600">{{$product->name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$product->extract}}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:grid-cols-2">
                <figure>
                    <img src="{{Storage::url($product->image->url)}}" class="w-full h-80 object-cover object-center">
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {{$product-body}}
                </div>
            </div>

            {{-- Contenido Relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más productos en {{$product->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a href="{{route('product.show', $similar)}}" class="flex">
                                <img src="{{Storage::url($similar->image->url)}}" alt="" class="w-36 h-20 object-cover object-center">
                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>         
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>