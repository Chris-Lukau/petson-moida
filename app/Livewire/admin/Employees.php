<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee;

class Employees extends Component
{
    public $showModal=false;

    public $employee_id;
    public $name;
    public $phone;
    public $bi;
    public $gender='Masculino';
    public $service='Coleta';

    public $search='';
    public $genderFilter='';
    public $serviceFilter='';

    public function openModal()
    {
        $this->resetForm();
        $this->showModal=true;
    }

    public function edit($id)
    {
        $e=Employee::findOrFail($id);

        $this->employee_id=$e->id;
        $this->name=$e->name;
        $this->phone=$e->phone;
        $this->bi=$e->bi;
        $this->gender=$e->gender;
        $this->service=$e->service;

        $this->showModal=true;
    }

    public function save()
    {
        Employee::updateOrCreate(
            ['id'=>$this->employee_id],
            [
                'name'=>$this->name,
                'phone'=>$this->phone,
                'bi'=>$this->bi,
                'gender'=>$this->gender,
                'service'=>$this->service,
            ]
        );

        $this->resetForm();
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
    }

    private function resetForm()
    {
        $this->reset([
            'employee_id',
            'name',
            'phone',
            'bi',
            'showModal'
        ]);
    }

    public function render()
{
    $employees = Employee::query()

        ->when($this->search, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        })

        ->when($this->genderFilter, function ($q) {
            $q->where('gender', $this->genderFilter);
        })

        ->when($this->serviceFilter, function ($q) {
            $q->where('service', $this->serviceFilter);
        })

        ->get();

    return view('livewire.admin.employees', [
        'employees' => $employees
    ])->layout('components.layouts.admin');
}
}