<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create([
            'nome' => 'Plantas de interior',
            'descricao' => 'Plantas adequadas para ambientes interiores e com luz indireta.',
        ]);

        Categoria::create([
            'nome' => 'Plantas de exterior',
            'descricao' => 'Plantas que se desenvolvem bem em jardins, varandas e terraços.',
        ]);

        Categoria::create([
            'nome' => 'Suculentas',
            'descricao' => 'Plantas resistentes que precisam de pouca água.',
        ]);
    }
}
