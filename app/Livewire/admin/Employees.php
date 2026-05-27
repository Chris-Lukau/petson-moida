<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Service;

class Employees extends Component
{
    // Estado do modal
    public $showModal = false;

    // Dados do formulário
    public $employee_id;
    public $name;
    public $phone;
    public $bi;
    public $gender = 'Masculino';
    public $service_id;          // ← chave estrangeira

    // Filtros da tabela
    public $search = '';
    public $genderFilter = '';
    public $serviceFilter = '';

    // Regras de validação (centralizadas e seguras)
    protected function rules()
    {
        return [
            'name'       => 'required|string|min:3|max:255',
            'phone' => [
    'required',
    'regex:/^\+244\s9\d{2}\s\d{3}\s\d{3}$/',
    'unique:employees,phone,' . $this->employee_id
],

'bi' => [
    'required',
    'regex:/^[0-9]{9}[A-Z]{2}[0-9]{3}$/',
    'unique:employees,bi_number,' . $this->employee_id
],
            'gender'     => 'required|in:Masculino,Feminino',
            'service_id' => 'required|exists:services,id',
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    // Mensagens personalizadas (opcional, mas profissional)
    protected function messages()
    {
        return [
            'name.required'       => 'O nome é obrigatório.',
            'name.min'            => 'O nome deve ter pelo menos 3 caracteres.',
            'phone.required'      => 'O telefone é obrigatório.',
            'phone.regex'         => 'Formato: +2449XXXXXXXX (9 dígitos após 244).',
            'bi.required'         => 'O BI é obrigatório.',
            'bi.regex'            => 'BI inválido (9 a 14 caracteres alfanuméricos).',
            'gender.required'     => 'Selecione o género.',
            'service_id.required' => 'Selecione um serviço.',
            'service_id.exists'   => 'O serviço seleccionado não existe.',
        ];
    }

    // Abrir modal para novo registo
    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    // Abrir modal para edição
    public function edit($id)
    {
        $employee = Employee::with('service')->findOrFail($id);

        $this->employee_id = $employee->id;
        $this->name        = $employee->name;
        $this->phone       = $employee->phone;
        $this->bi = $employee->bi_number;
        $this->gender      = $employee->gender;
        $this->service_id  = $employee->service_id;

        $this->showModal = true;
    }

    public function updatedPhone()
{
    $this->phone = preg_replace('/\s+/', '', $this->phone);
}

    // Salvar (criar ou actualizar)
    public function save()
    {
        $validatedData = $this->validate();  // lança excepção automática em caso de erro

        try {
            Employee::updateOrCreate(
                ['id' => $this->employee_id],
                [
                    'name'       => $validatedData['name'],
                    'phone'      => $validatedData['phone'],
                    'bi_number' => $validatedData['bi'],
                    'gender'     => $validatedData['gender'],
                    'service_id' => $validatedData['service_id'],
                ]
            );

            $this->resetForm();
            $this->showModal = false;

            // Mensagem de sucesso (podes exibir num toast ou num alerta)
            session()->flash('message', 'Funcionário salvo com sucesso.');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao salvar: ' . $e->getMessage());
        }
    }

    // Eliminar
    public function delete($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            session()->flash('message', 'Funcionário removido.');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao eliminar: ' . $e->getMessage());
        }
    }

    // Reset completo do formulário
    private function resetForm()
    {
        $this->reset([
            'employee_id',
            'name',
            'phone',
            'bi',
            'service_id',
            'showModal'
        ]);
        $this->gender = 'Masculino';
        $this->resetErrorBag();  // limpa erros de validação anteriores
    }

    // Renderização da página
    public function render()
    {
        // Buscar funcionários com o serviço relacionado
        $employees = Employee::with('service')
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
            ->when($this->genderFilter, fn($q) => $q->where('gender', $this->genderFilter))
            ->when($this->serviceFilter, fn($q) => $q->where('service_id', $this->serviceFilter))
            ->get();

        // Todos os serviços para o dropdown
        $services = Service::orderBy('name')->get();

        return view('livewire.admin.employees', [
            'employees' => $employees,
            'services'  => $services,
        ])->layout('components.layouts.admin');
    }
}