<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Resident;

class Dashboard extends Component
{
    use WithPagination;

    public $search = '';
    public $endereco = '';
    public $bairro = '';
    public $zona = '';
    public $estado = '';
    public $totalUsuarios;
    public $totalEnderecos;
    public $totalMoradores;
    public $totalCasas;
    public $recolhasHoje;
    public $pendentes;
    public $ativos;
    public $inativos;

    public function mount()
    {
        $this->totalMoradores = Resident::count();

        $this->totalCasas =
            Resident::distinct('endereco')
            ->count('endereco');

        // Ainda não criamos estas funcionalidades,
        // então começamos com zero.
        $this->recolhasHoje = 0;

        $this->pendentes = 0;

        // Assumindo que todos os moradores cadastrados são ativos.
        $this->ativos = Resident::count();

        $this->inativos = 0;
    }

    public function render()
    {
        $query = Resident::query();

        if ($this->search) {
            $query->where('nome_completo', 'like', '%' . $this->search . '%');
        }

        if ($this->endereco) {
            $query->where('endereco', $this->endereco);
        }

        if ($this->bairro) {
            $query->where('bairro', $this->bairro);
        }


        return view('livewire.admin.dashboard', [

            'usuarios' => $query->paginate(50),

            'enderecos' => Resident::select('endereco')
                ->distinct()
                ->pluck('endereco'),

            'bairros' => Resident::select('bairro')
                ->distinct()
                ->pluck('bairro'),

            'zonas' => Resident::select('zona')
                ->distinct()
                ->pluck('zona'),

            'totalMoradores' => $this->totalMoradores,
            'totalCasas' => $this->totalCasas,
            'recolhasHoje' => $this->recolhasHoje,
            'pendentes' => $this->pendentes,
            'ativos' => $this->ativos,
            'inativos' => $this->inativos

        ])->layout('components.layouts.admin');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingEndereco()
    {
        $this->resetPage();
    }

    public function updatingBairro()
    {
        $this->resetPage();
    }

    public function updatingZona()
    {
        $this->resetPage();
    }

    public function updatingEstado()
    {
        $this->resetPage();
    }
}
