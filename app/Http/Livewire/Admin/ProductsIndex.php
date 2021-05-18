<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class ProductsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    } //UpdatingSearch se activará unicamente cuando el valor de la propiedad search cambie

    public function render()
    {
        $products = Product::where('user_id', auth()->user()->id)
                            ->where('name', 'LIKE','%' . $this->search . '%') //Este filtro es de busqueda. Con el caracter '%' le estoy diciendo que puede existir texto antes y despues de la palabra que se está buscando.
                            ->latest('id')
                            ->paginate();
        return view('livewire.admin.products-index', compact('products'));
    }
}
