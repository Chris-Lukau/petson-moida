<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nome_completo' => 'required|min:3',

            'telefone' => [
                'required',
                'regex:/^\+244\d{9}$/'
            ],

            'genero' => 'required|in:Masculino,Feminino',

            'endereco' => 'required|min:5',
        ]);

        Resident::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Cadastro realizado com sucesso.'
        ]);
    }
}