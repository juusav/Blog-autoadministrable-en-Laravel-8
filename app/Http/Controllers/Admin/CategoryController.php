<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category){
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category){
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$category->id" //Ignora el slug de la categoria que queremos cambiar. En otras palabras, esto no permite poner el nombre de un slug creado en otra categoria.
        ]);
        $category->update($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info', 'La categoría se eliminó correctamente');
    }
}
