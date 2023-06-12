<?php

namespace Tests\Unit;

use App\Http\Livewire\CategoriesController;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_category()
    {
        Livewire::test(CategoriesController::class)
            ->set('name', 'Test Category')
            ->call('Store');

        $this->assertTrue(Category::where('name', 'Test Category')->exists());
    }

    public function test_update_category()
    {
        $category = Category::factory()->create(); // Crear una categoría

        Livewire::test(CategoriesController::class)
            ->set('selected_id', $category->id)
            ->set('name', 'Updated Category')
            ->call('Update');

        $this->assertTrue(Category::where('name', 'Updated Category')->exists());
    }


    public function test_delete_category()
    {
        $category = Category::factory()->create();

        Livewire::test(CategoriesController::class)
            ->call('Destroy', $category);

        $this->assertFalse(Category::where('id', $category->id)->exists());
    }
}
