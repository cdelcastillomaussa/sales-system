<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Productos')]
class ProductComponent extends Component
{
    //Class properties
    public $search = '';
    public $recordsTotal = 0;
    public $cant=5;

    //Model properties
    public $Id;
    public $name;

    public function render()
    {

        $this->dispatch('open-modal', 'modalProduct');
        $this->recordsTotal = Product::count();
        $products = Product::where('name', 'like', "%{$this->search}%")
                        ->orderBy('id', 'desc')
                        ->paginate($this->cant);
        return view('livewire.product.product-component', ['products' => $products]);
    }

    public function create()
    {
        $this->Id = 0;
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalProduct');

        
    }
}
