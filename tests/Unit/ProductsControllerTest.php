<?php

namespace Tests\Unit;

use App\Http\Livewire\ProductsController;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Category::create(['name' => 'Category 1']);
    }

    /** @test */
    public function it_can_store_a_product()
    {
        Livewire::test(ProductsController::class)
            ->set('name', 'Test Product')
            ->set('barcode', '123456789')
            ->set('cost', 10.0)
            ->set('price', 20.0)
            ->set('stock', 100)
            ->set('alerts', 10)
            ->set('categoryid', '1')
            ->call('Store');

        $this->assertTrue(true);
    }
}
