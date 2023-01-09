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
    private $pagination = 5;

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
}
