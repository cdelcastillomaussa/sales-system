<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Categorias')]
class CategoryComponent extends Component
{
    //property class
    public $recordsTotal = 0;

    //property model
    public $name;

    public function render()
    {
        $this->recordsTotal = Category::count();
        return view('livewire.category.category-component');
    }
    public function mount()
    {
        
    }

    //create category
    public function store()
    {
        $rules = [
            'name'  => 'required|min:5|max:255|unique:Categories'
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 5 caracteres',
            'name.max' => 'El nombre no debe superar los 255 caracteres',
            'name.unique' => 'El nombre de la categoria ya esta en uso'
        ];

        $this->validate($rules, $messages);

        $category = new Category();
        $category->name = $this->name;
        $category->save();

        $this->dispatch('close-modal', 'modalCategory');
        $this->dispatch('msg', 'Categoría creada correctamente.');
        $this->reset(['name']);
    }
}
