<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

#[Title('Categorias')]
class CategoryComponent extends Component
{
    use WithPagination;
    //property class
    public $search = '';
    public $recordsTotal = 0;
    public $cant=5;

    //property model
    public $name;
    public $Id;

    public function render()
    {
        if($this->search != ''){
            $this->resetPage();
        }

        $this->recordsTotal = Category::count();
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
                        ->orderBy('id', 'desc')
                        ->paginate($this->cant);
        // $categories = collect();
        return view('livewire.category.category-component', ['categories' => $categories]);
    }
    public function mount()
    {
        
    }

    public function create()
    {
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->dispatch('open-modal', 'modalCategory');

        
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

    public function edit(Category $category){
        $this->Id = $category->id;
        $this->name = $category->name;
        $this->dispatch('open-modal', 'modalCategory');
        // $this->dispatch('msg', 'Categoría creada correctamente.');

    }

    public function update(Category $category){

        $rules = [
            'name'  => 'required|min:5|max:255|unique:Categories,id,'.$this->Id
        ];
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener minimo 5 caracteres',
            'name.max' => 'El nombre no debe superar los 255 caracteres',
            'name.unique' => 'El nombre de la categoria ya esta en uso'
        ];

        $this->validate($rules, $messages);
        $category->name = $this->name;
        $category->update();
        $this->dispatch('close-modal', 'modalCategory');
        $this->dispatch('msg', 'Categoría actualizada correctamente.');
        $this->reset(['name']);

    }

    #[On('destroyCategory')]
    public function destroy($id){
        $category = Category::findOrfail($id);
        $category->delete();
        $this->dispatch('msg', 'Categoria eliminada correctamente.');
    }
}
