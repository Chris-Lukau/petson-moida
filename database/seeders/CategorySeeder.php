<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Limpeza Residencial',
            'slug' => 'limpeza-residencial'
        ]);

        Category::create([
            'name' => 'Limpeza Comercial e Empresarial',
            'slug' => 'limpeza-comercial-empresarial'
        ]);

        Category::create([
            'name' => 'Limpeza de Obras',
            'slug' => 'limpeza-de-obras'
        ]);

        Category::create([
            'name' => 'Jardinagem e Manutenção Exterior',
            'slug' => 'jardinagem-e-manutencao-exterior'
        ]);
    }
}