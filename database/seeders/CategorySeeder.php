<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            "name" => "ALIMENTOS",
            "IMAGE" => "https://dummyimage.com/200x150/5c5123/fff"
        ]);
        Category::create([
            "name" => "BEBIDAS",
            "IMAGE" => "https://dummyimage.com/200x150/5c5123/fff"
        ]);
        Category::create([
            "name" => "PRODUCTOS DE LIMPIEZA",
            "IMAGE" => "https://dummyimage.com/200x150/5c5123/fff"
        ]);
        Category::create([
            "name" => "PRODUCTOS CUIDADO PERSONAL",
            "IMAGE" => "https://dummyimage.com/200x150/5c5123/fff"
        ]);
        Category::create([
            "name" => "ABARROTES",
            "IMAGE" => "https://dummyimage.com/200x150/5c5123/fff"
        ]);
        Category::create([
            "name" => "MASCOTAS",
            "IMAGE" => "https://dummyimage.com/200x150/5c5123/fff"
        ]);
        Category::create([
            "name" => "PAPELERIA",
            "IMAGE" => "https://dummyimage.com/200x150/5c5123/fff"
        ]);
    }
}
