<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $name, $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Categorías";
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
        // para usar la busqueda, la paginacion y el orden desde el frontend  la cual es mas rapida

        //  $data = Category::all();

        // Usar la busqueda, la paginacion y el orden desde el back que es mas lento

        if (strlen($this->search) > 0)
            $data = Category::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $data = Category::orderBy('id', 'desc')->paginate($this->pagination);

        // end busqueda backend

        return view('livewire.category.categories', ['categories' => $data])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Edit($id)
    {
        // $record = Category::find($id);
        $record = Category::find($id, ['id', 'name', 'image']);
        $this->name = $record->name;
        $this->selected_id = $record->id;
        $this->image = null;

        $this->emit('show-modal', 'mostrar Modal!!!');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|unique:categories|min:3'
        ];

        $messages = [
            'name.required' => 'Es requerido un nombre de categoria',
            'name.unique' => 'Ya existe una categoría con ese nombre',
            'name.min' => 'El nombre de categoria debe tener mínimo 3 caracteres'
        ];

        $this->validate($rules, $messages);

        $category = Category::create([
            'name' => $this->name
        ]);

        $customFileName;
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories', $customFileName);
            $category->image = $customFileName;
            $category->save();
        }

        $this->resetUI();
        $this->emit('category-added', 'Categoria registrada');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
    }
}
