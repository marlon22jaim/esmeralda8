<?php

namespace Tests\Unit;


use App\Http\Livewire\PosController;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testMout()
    {
        // Crear instancia del controlador
        $controller = new PosController();

        // Llamar al método mout
        $controller->mout();

        // Verificar que las propiedades se han actualizado correctamente
        $this->assertEquals(0, $controller->efectivo);
        $this->assertEquals(0, $controller->change);
    }

    public function testRender()
    {
        // Crear instancia del controlador
        $controller = new PosController();

        // Llamar al método render
        $view = $controller->render();

        // Verificar que la vista se ha generado correctamente
        $this->assertNotEmpty($view);
    }

    public function testSaveSale()
    {
        // Crear instancia del controlador
        $controller = new PosController();

        // Simular los datos necesarios para la prueba
        $controller->total = 100;
        $controller->itemsQuantity = 2;
        $controller->efectivo = 150;
        $controller->change = 50;

        // Ejecutar el método saveSale()
        $controller->saveSale();

        // Verificar que el carrito se haya limpiado después de guardar la venta
        $this->assertTrue(Cart::isEmpty());
    }
}
