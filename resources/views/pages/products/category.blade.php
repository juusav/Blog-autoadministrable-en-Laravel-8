<x-app-layout>
    <div class="container py-8">
        <h1 class="uppercase text-center text-3xl font-bold">
            Categoría: {{$category->name}}
        </h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        
            @foreach ($products as $product)
                <x-card-products :product="$product">
                     
                </x-card-products>
            @endforeach
        
        </div>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>