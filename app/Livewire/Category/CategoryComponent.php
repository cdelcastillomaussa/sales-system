<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Categorias')]
class CategoryComponent extends Component
{
    use WithPagination;
    //property class
    public $recordsTotal = 0;

    //property model
    public $name;

    public function render()
    {
        $this->recordsTotal = Category::count();
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        // $categories = collect();
        return view('livewire.category.category-component', ['categories' => $categories]);
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
