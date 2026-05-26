<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Residence;

class Dashboard extends Component
{
    use WithPagination;

    public $search = '';
    public $endereco = '';
    public $totalUsuarios;
    public $totalEnderecos;

    public function mount()
    {
        $this->totalUsuarios = Residence::count();
        $this->totalEnderecos =
            Residence::distinct('endereco')->count('endereco');
    }

    public function render()
    {
        $query = Residence::query();

        if ($this->search) {
            $query->where('nome_completo', 'like', '%' . $this->search . '%');
        }

        if ($this->endereco) {
            $query->where('endereco', $this->endereco);
        }

        return view('livewire.admin.dashboard', [
            'usuarios' => $query->paginate(50),
            'enderecos' => Residence::select('endereco')
                ->distinct()
                ->pluck('endereco')
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
}