<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::insert([
            ['category_id'=>1,'name'=>'Faxina Padrão','pricing_type'=>'fixed','base_price'=>15000],
            ['category_id'=>1,'name'=>'Faxina Pesada','pricing_type'=>'fixed','base_price'=>25000],
            ['category_id'=>1,'name'=>'Limpeza Pós-Mudança','pricing_type'=>'fixed','base_price'=>30000],
            ['category_id'=>1,'name'=>'Limpeza de Vidros/Janelas','pricing_type'=>'hourly','base_price'=>10000],

            ['category_id'=>2,'name'=>'Limpeza de Escritórios','pricing_type'=>'monthly','base_price'=>5000],
            ['category_id'=>2,'name'=>'Limpeza de Fachadas e Vidros','pricing_type'=>'m2','base_price'=>7000],
            ['category_id'=>2,'name'=>'Higienização de Sanitários','pricing_type'=>'fixed','base_price'=>3000],

            ['category_id'=>3,'name'=>'Limpeza Grossa','pricing_type'=>'m2','base_price'=>4500],
            ['category_id'=>3,'name'=>'Limpeza Técnica','pricing_type'=>'m2','base_price'=>6000],

            ['category_id'=>4,'name'=>'Manutenção de Jardins','pricing_type'=>'monthly','base_price'=>5000],
            ['category_id'=>4,'name'=>'Paisagismo e Plantio','pricing_type'=>'fixed','base_price'=>7000],
        ]);
    }
}