<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller{
    
    public function __construct(){
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
    }

    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){ 
        //Encargado de validar la creación de una nueva categoria
        $request->validate([ 
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);

        //Encarga de crear
        $category = Category::create($request->all());
        
        //Redireccion a la misma vista con mensaje que se ha creado correctamente
        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se creó correctamente');
    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$category->id" //Ignora el slug de la categoria que queremos cambiar. En otras palabras, esto no permite poner el nombre de un slug creado en otra categoria.
        ]);
        $category->update($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se actualizó correctamente');
    }
    
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info', 'La categoría se eliminó correctamente');
    }
}
