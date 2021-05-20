<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tag;

use function PHPUnit\Framework\returnSelf;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
    }
    public function index(){
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
    public function create(){
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'verde' => 'Color verde',
            'orange' => 'Color naranja',
            'purple' => 'Color morado',
        ];
        return view('admin.tags.create', compact('colors'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se creó correctamente');
    }
    public function edit(Tag $tag){
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'verde' => 'Color verde',
            'orange' => 'Color naranja',
            'purple' => 'Color morado',
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }
    public function update(Request $request, Tag $tag){
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        $tag->updated($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizó correctamente');
    }
    public function destroy(Tag $tag){
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se eliminó correctamente');
    }
}
