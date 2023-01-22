<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Denomination;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class CoinsController extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $type, $value, $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function mount()
    {
        $this->pageTitle = "Listado";
        $this->componentName = "Denominaciones";
        $this->type = "Elegir";
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
        // para usar la busqueda, la paginacion y el orden desde el frontend  la cual es mas rapida

        //  $data = Denomination::all();

        // Usar la busqueda, la paginacion y el orden desde el back que es mas lento

        if (strlen($this->search) > 0)
            $data = Denomination::where('type', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $data = Denomination::orderBy('id', 'desc')->paginate($this->pagination);

        // end busqueda backend

        session(['title' => 'Monedas']);
        return view('livewire.denominations.component', ['data' => $data])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Edit($id)
    {
        // $record = Category::find($id);
        $record = Denomination::find($id, ['id', 'type', 'value', 'image']);
        $this->type = $record->type;
        $this->value = $record->value;
        $this->selected_id = $record->id;
        $this->image = null;

        $this->emit('show-modal', 'mostrar Modal!!!');
    }

    public function Store()
    {
        $rules = [
            'type' => 'required|not_in:Elegir',
            'value' => 'required|unique:denominations'
        ];

        $messages = [
            'type.required' => 'El tipo es requerido',
            'type.not_in' => 'Elige un tipo diferente',
            'value.required' => 'El valor es requerido',
            'value.unique' => 'Ya existe el valor',
        ];

        $this->validate($rules, $messages);

        $denomination = Denomination::create([
            'type' => $this->type,
            'value' => $this->value
        ]);


        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/denominations', $customFileName);
            $denomination->image = $customFileName;
            $denomination->save();
        }

        $this->resetUI();
        $this->emit('item-added', 'Denominación registrada');
    }

    public function Update()
    {
        $rules = [
            'type' => 'required|not_in:Elegir',
            'value' => "required|unique:denominations,value,{$this->selected_id}"
        ];

        $messages = [
            'type.required' => 'El tipo es requerido',
            'type.not_in' => 'Elige un tipo diferente',
            'value.required' => 'El valor es requerido',
            'value.unique' => 'Ya existe el valor',
        ];

        $this->validate($rules, $messages);

        $denomination = Denomination::find($this->selected_id);

        $denomination->update([
            'type' => $this->type,
            'value' => $this->value
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/denominations', $customFileName);
            $imageName = $denomination->image;

            $denomination->image = $customFileName;
            $denomination->save();

            if ($imageName != null) {
                if (file_exists('storage/denominations' . $imageName)) {
                    unlink('storage/denominations' . $imageName);
                }
            }
        }
        $this->resetUI();
        $this->emit('item-updated', 'Denominación Actualizada');
    }



    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];

    public function Destroy(Denomination $denomination)
    {
        // $denomination = Category::find($id);
        // dd($denomination);
        $imageName = $denomination->image; // imagen temporal para proceder a eliminarla
        $denomination->delete();

        if ($imageName != null) {
            unlink('storage/denominations/' . $imageName);
        }

        $this->resetUI();
        $this->emit('item-deleted', 'Denominación Eliminada');
    }



    public function resetUI()
    {
        $this->type = '';
        $this->value = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
        $this->emit('hide-modal');
    }
}
