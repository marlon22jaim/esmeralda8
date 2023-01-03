<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            "name" => "LECHE",
            "cost" => 3000,
            "price" => 3800,
            "barcode" => "123456789",
            "stock" => 20,
            "alerts" => 8,
            "category_id" => 1,
            "image" => "leche.png"
        ]);
        Product::create([
            "name" => "AGUA",
            "cost" => 1000,
            "price" => 1500,
            "barcode" => "12345678",
            "stock" => 25,
            "alerts" => 8,
            "category_id" => 2,
            "image" => "agua.png"
        ]);
        Product::create([
            "name" => "JABÓN PARA PLATOS",
            "cost" => 2500,
            "price" => 3500,
            "barcode" => "1234567",
            "stock" => 17,
            "alerts" => 5,
            "category_id" => 3,
            "image" => "jabon_platos.png"
        ]);
        Product::create([
            "name" => "CEPILLO DE DIENTES",
            "cost" => 1800,
            "price" => 2500,
            "barcode" => "123456",
            "stock" => 20,
            "alerts" => 5,
            "category_id" => 4,
            "image" => "cepillo_dientes.png"
        ]);
        Product::create([
            "name" => "ARROZ",
            "cost" => 3000,
            "price" => 4500,
            "barcode" => "12345",
            "stock" => 30,
            "alerts" => 5,
            "category_id" => 5,
            "image" => "arroz.png"
        ]);
        Product::create([
            "name" => "AZÚCAR",
            "cost" => 3000,
            "price" => 4500,
            "barcode" => "123458",
            "stock" => 28,
            "alerts" => 5,
            "category_id" => 5,
            "image" => "azucar.png"
        ]);
        Product::create([
            "name" => "COMIDA GATOS 1KG",
            "cost" => 7000,
            "price" => 9500,
            "barcode" => "13458",
            "stock" => 15,
            "alerts" => 5,
            "category_id" => 6,
            "image" => "comida_gatos.png"
        ]);
        Product::create([
            "name" => "LAPICERO MARCA BIC",
            "cost" => 1000,
            "price" => 1500,
            "barcode" => "134589",
            "stock" => 30,
            "alerts" => 10,
            "category_id" => 7,
            "image" => "lapicero.png"
        ]);
    }
}
