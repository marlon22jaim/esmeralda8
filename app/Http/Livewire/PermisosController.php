<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use App\Models\User;
use DB;

class PermisosController extends Component
{
    use WithPagination;
    public $permissionName, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Permisos';
    }

    public function render()
    {

        if (strlen($this->search) > 0)
            $permisos = Permission::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $permisos = Permission::orderBy('name', 'asc')->paginate($this->pagination);

        session(['title' => 'Permisos']);
        return view('livewire.permisos.component', [
            'permisos' => $permisos
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function CreatePermission()
    {
        $rules = ['permissionName' => 'required|min:5|unique:permissions,name'];
        $messages = [
            'permissionName.required' => 'El nombre del Permiso es Requerido',
            'permissionName.unique' => 'El Permiso ya existe',
            'permissionName.min' => 'El Permiso debe tener minimo 5 caracteres'
        ];
        $this->validate($rules, $messages);

        Permission::create([
            'name' => $this->permissionName
        ]);

        $this->emit('permiso-added', 'Se registró el Permiso con Éxito');
        $this->resetUI();
    }

    public function Edit(Permission $permiso)
    {
        // $permiso = Permission::find($id);
        $this->selected_id = $permiso->id;
        $this->permissionName = $permiso->name;
        $this->emit('show-modal', 'Show modal');
    }

    public function UpdatePermission()
    {
        $rules = ['permissionName' => "required|min:5|unique:permissions,name, {$this->selected_id}"];
        $messages = [
            'permissionName.required' => 'El nombre del Permiso es Requerido',
            'permissionName.unique' => 'El Permiso ya existe',
            'permissionName.min' => 'El Permiso debe tener minimo 5 caracteres'
        ];
        $this->validate($rules, $messages);

        $permiso = Permission::find($this->selected_id);
        $permiso->name = $this->permissionName;
        $permiso->save();
        $this->emit('permiso-updated', 'Se Actualizó el Permiso con Éxito');
        $this->resetUI();
    }
    protected $listeners = ['destroy' => 'Destroy'];

    public function Destroy($id)
    {
        // dd($id);
        $rolesCount = Permission::find($id)->getRoleNames()->count();
        if ($rolesCount > 0) {
            $this->emit('permiso-error', 'No se puede eliminar el Permiso porque tiene Roles asignados');
            return;
        }
        Permission::find($id)->delete();
        $this->emit('permiso-deleted', 'Se Eliminó el Permiso con Éxito');
    }
    public function resetUI()
    {
        $this->permissionName = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->emit('hide-modal');
        $this->resetValidation();
    }
}
