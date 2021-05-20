<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\tag;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.destroy')->only('destroy');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');
    }
    public function index(){
        return view('admin.products.index');
    }
    public function create(){
        $categories = Category::pluck('name', 'id'); //Pluck crea array del valor especificado 
        $tags = Tag::all();
        return view('admin.products.create', compact('categories', 'tags'));
    }

    //Cuando llegue acá validará los datos del form y relacionará el product con los tags seleccionados 
    public function store(ProductRequest $request){ 

        $product = Product::create($request->all());

        if($request->file('file')){
            $url = Storage::put('products', $request->file('file'));

            $product->image()->create([
                'url'=> $url
            ]);
        };

        if($request->tags){
            $product->tags()->attach($request->tags);
        }
        return redirect()->route('admin.products.edit', $product);
    }
    public function edit(Product $product){
        $this->authorize('author', $product);

        $categories = Category::pluck('name', 'id'); //Pluck crea array del valor especificado 
        $tags = Tag::all();
        
        return view('admin.products.edit', compact('product', 'categories', 'tags'));
    }
    public function update(ProductRequest $request, Product $product){
        $this->authorize('author', $product);

        $product->update($request->all());

        if ($request->file('file')){
            $url = Storage::put('products', $request->file('file'));

            if($product->image){
                Storage::delete($product->image->url);

                $product->image->update([
                    'url' => $url
                ]);

            }else{
                $product->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($request->tags){
            $product->tags()->sync($request->tags);
        }

        return redirect()->route('admin.products.edit', $product)->with('info', 'El producto se actualizó correctamente');
    }
    public function destroy(Product $product){
        $this->authorize('author', $product);        

        $product->delete();

        return redirect()->route('admin.products.index', $product)->with('info', 'El producto se eliminó correctamente');
    }
}
