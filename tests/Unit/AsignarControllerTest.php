<?php


namespace Tests\Unit;

use App\Http\Livewire\AsignarController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AsignarControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_asignar_permisos_a_rol()
    {
        // Crea un rol y permisos de prueba
        $rol = Role::create(['name' => 'Rol de prueba']);
        $permiso1 = Permission::create(['name' => 'Permiso 1']);
        $permiso2 = Permission::create(['name' => 'Permiso 2']);

        // Crea una instancia de la clase AsignarController
        $componente = Livewire::test(AsignarController::class);

        // Asigna el rol de prueba al componente
        $componente->set('role', $rol->id);

        // Selecciona los permisos de prueba en el componente
        $componente->set('permisosSelected', [$permiso1->id, $permiso2->id]);

        // Ejecuta la acción de sincronizar los permisos
        $componente->call('SyncPermiso', true, $permiso1->name);
        $componente->call('SyncPermiso', true, $permiso2->name);

        // Verifica que los permisos estén asignados correctamente al rol
        $this->assertTrue($rol->hasPermissionTo($permiso1->name));
        $this->assertTrue($rol->hasPermissionTo($permiso2->name));
    }
}
