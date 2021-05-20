<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    public function creating(Product $product)
    {
        if (! \App::runningInConsole()){
            $product->user_id = auth()->user()->id; //Esto permite asignar el producto al usuario que lo creo 
        }
    }

    public function deleting(Product $product)
    {
        if ($product->image){
            Storage::delete($product->image->url);
        }
    }

}
