<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class PlantaSeeder extends Seeder
{
    public function run(): void
    {
        $interior = Categoria::where('nome', 'Plantas de interior')->firstOrFail();
        $exterior = Categoria::where('nome', 'Plantas de exterior')->firstOrFail();
        $suculentas = Categoria::where('nome', 'Suculentas')->firstOrFail();

        $interior->plantas()->create([
            'nome' => 'Monstera deliciosa',
            'nome_cientifico' => 'Monstera deliciosa',
            'descricao' => 'Planta tropical com folhas grandes e recortadas.',
            'preco' => 24.90,
            'stock' => 8,
            'imagem_url' => 'https://placehold.co/600x400/png?text=Monstera',
        ]);

        $interior->plantas()->create([
            'nome' => 'Espada-de-São-Jorge',
            'nome_cientifico' => 'Dracaena trifasciata',
            'descricao' => 'Planta resistente e fácil de cuidar em ambientes interiores.',
            'preco' => 14.50,
            'stock' => 12,
            'imagem_url' => 'https://placehold.co/600x400/png?text=Espada-de-Sao-Jorge',
        ]);

        $exterior->plantas()->create([
            'nome' => 'Lavanda',
            'nome_cientifico' => 'Lavandula angustifolia',
            'descricao' => 'Planta aromática com flores roxas e aroma suave.',
            'preco' => 9.90,
            'stock' => 15,
            'imagem_url' => 'https://placehold.co/600x400/png?text=Lavanda',
        ]);

        $suculentas->plantas()->create([
            'nome' => 'Aloe vera',
            'nome_cientifico' => 'Aloe barbadensis miller',
            'descricao' => 'Suculenta de folhas carnudas, conhecida pelas suas propriedades.',
            'preco' => 11.75,
            'stock' => 10,
            'imagem_url' => 'https://placehold.co/600x400/png?text=Aloe+Vera',
        ]);
    }
}
