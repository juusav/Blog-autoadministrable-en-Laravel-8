@props(['product']){{--  Especifico que el atributo 'product' debe considerarse variable de datos --}}

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($product->image)
        <img src="{{Storage::url($product->image->url)}}" class="w-full h-72 object-cover object-center">
    @else
        <img src="https://cdn.pixabay.com/photo/2020/06/19/21/44/watermelon-5318938_960_720.jpg " class="w-full h-72 object-cover object-center">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('product.show', $product)}}">{{$product->name}}</a>
        </h1>
        <div class="text-gray-700 px-4 text-base">
            {!!$product->extract!!} 
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($product->tags as $tag)
            <a href="{{route('product.tag', $tag)}}"class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
        @endforeach
    </div>
</article>