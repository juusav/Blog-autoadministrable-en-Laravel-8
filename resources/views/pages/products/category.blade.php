<x-app-layout>
    <div class="max-w5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">
            Categoría: {{$category->name}}
        </h1>

        @foreach ($products as $product)
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{Storage::url($product->image->url)}}" class="w-full h-72 object-cover object-center">

                <div class="px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">
                        <a href="{{route('product.show', $product)}}">{{$product->name}}</a>
                    </h1>
                </div>
                <div class="text-gray-700 px-4 text-base">
                    {{$product->extract}} 
                </div>

                <div class="px-6 pt-4 pb-2">
                    @foreach ($product->tags as $tag)
                        <a href=""class="inline-block bg-gray-200 rounded-full px3 py-1 text-sm text-gray-700"></a>
                    @endforeach
                </div>
            </article>
        @endforeach

        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>