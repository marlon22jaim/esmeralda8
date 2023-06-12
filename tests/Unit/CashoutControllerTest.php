<?php

namespace Tests\Unit;

use App\Http\Livewire\CashoutController;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Livewire;
use Tests\TestCase;

class CashoutControllerTest extends TestCase
{
    public function test_consultar_actualiza_ventas_totales()
    {
        // Crea un usuario de prueba
        $usuario = User::factory()->create([
            'profile' => 'default',
        ]);

        // Crea ventas de prueba
        $venta1 = Sale::factory()->create([
            'created_at' => Carbon::now()->subDays(1),
            'status' => 'Paid',
            'user_id' => $usuario->id,
            'total' => 100,
            'items' => 0, // Establece el valor de items
        ]);

        $venta2 = Sale::factory()->create([
            'created_at' => Carbon::now()->subDays(1),
            'status' => 'Paid',
            'user_id' => $usuario->id,
            'total' => 200,
            'items' => 0, // Establece el valor de items
        ]);

        // Crea una instancia del controlador CashoutController
        $componente = Livewire::test(CashoutController::class);

        // Establece los datos necesarios en el componente
        $componente->set('fromDate', Carbon::now()->subDays(1)->toDateString());
        $componente->set('toDate', Carbon::now()->toDateString());
        $componente->set('userid', $usuario->id);

        // Ejecuta la acción de consultar
        $componente->call('Consultar');

        // Verifica que el total de ventas se haya actualizado correctamente
        $this->assertEquals(300, $componente->get('total'));
    }
}
