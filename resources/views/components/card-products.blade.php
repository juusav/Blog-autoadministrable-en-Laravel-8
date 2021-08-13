@props(['product']){{--  Especifico que el atributo 'product' debe considerarse variable de datos --}}
<article class=" bg-white shadow-lg rounded-lg overflow-hidden">
    
    <a href="{{route('product.show', $product)}}">
        @if ($product->image)
            <img src="{{Storage::url($product->image->url)}}" class="w-full h-40 object-cover object-center">
        @else
            <img src="https://cdn.pixabay.com/photo/2020/06/19/21/44/watermelon-5318938_960_720.jpg " class="w-full h-72 object-cover object-center">
        @endif
        <div class="px-3 py-2 h-60">
            <h1 class="font-bold text-xl mb-2">
                {{$product->name}}
            </h1>
            <div class="text-gray-700 px-4 ">
                {!!$product->extract!!} 
            </div>
        </div>
        <div class="price text-white px-4 bg-blue-400">
            <p>€ {!!$product->price!!}</p>
        </div>
    </a>

</article>

