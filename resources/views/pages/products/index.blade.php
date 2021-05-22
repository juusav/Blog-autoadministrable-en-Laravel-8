<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($products as $product)
                <article class="w-full h-80 bg-cover bg-center" {{-- @if($loop->first) md:col-span-2 @endif --}}
                    style="background-image: url(@if($product->image) {{Storage::url($product->image->url)}} @else https://cdn.pixabay.com/photo/2020/06/19/21/44/watermelon-5318938_960_720.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        {{-- <div>
                            @foreach ($product->$tags as $tag)
                                <a href="{{route('product.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div> --}}
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('product.show', $product)}}">
                                {{$product->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>