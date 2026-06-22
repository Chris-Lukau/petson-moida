<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
        'nome_completo',
        'telefone',
        'genero',
        'provincia',
        'municipio',
        'bairro',
        'endereco',
        'zona',
        'latitude',
        'longitude',
        'referencia',
        'email',
        'password',
        'active'
    ];
}
