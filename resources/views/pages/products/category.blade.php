<x-app-layout>
    <div class="max-w5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">
            Categoría: {{$category->name}}
        </h1>

        @foreach ($products as $product)
            <x-card-products :product="$product">
                 
            </x-card-products>
        @endforeach

        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>