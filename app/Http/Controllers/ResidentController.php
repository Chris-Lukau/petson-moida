<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResidentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([

            'nome_completo' => 'required|min:3',

            'telefone' => [
                'required',
                'regex:/^\+244\d{9}$/',
                'unique:residents,telefone'
            ],

            'genero' => 'required|in:Masculino,Feminino',

            'provincia' => 'required',

            'municipio' => 'required',

            'bairro' => 'required',

            'zona' => 'required',

            'endereco' => 'required|min:5',

            'referencia' => 'nullable',

            'email' => 'required|email|unique:residents,email',

            'password' => 'required|min:6|confirmed',

        ]);

        $validated['password'] = Hash::make($validated['password']);

        $validated['active'] = true;
        
        Resident::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Cadastro realizado com sucesso.'
        ]);
    }
}
