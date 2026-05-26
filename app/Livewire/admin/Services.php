<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Service;
use App\Models\Category;

class Services extends Component
{
    use WithFileUploads;

    public $showModal = false;

    public $service_id;
    public $category_id;
    public $name;
    public $pricing_type = 'fixed';
    public $base_price;
    public $photo;

    public $search='';
    public $status='';

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        $this->service_id = $service->id;
        $this->category_id = $service->category_id;
        $this->name = $service->name;
        $this->pricing_type = $service->pricing_type;
        $this->base_price = $service->base_price;

        $this->showModal = true;
    }

    public function save()
    {
        $data = [
            'category_id'=>$this->category_id,
            'name'=>$this->name,
            'pricing_type'=>$this->pricing_type,
            'base_price'=>$this->base_price,
        ];

        if($this->photo){
            $data['photo_path'] =
                $this->photo->store('services','public');
        }

        Service::updateOrCreate(
            ['id'=>$this->service_id],
            $data
        );

        $this->resetForm();
        $this->showModal = false;
    }

    public function toggle($id)
    {
        $service = Service::findOrFail($id);

        $service->active = !$service->active;
        $service->save();
    }

    private function resetForm()
{
    $this->reset([
        'service_id',
        'category_id',
        'name',
        'base_price',
        'photo',
        'showModal'
    ]);

    $this->pricing_type = 'fixed';
}

    public function render()
{
    $categories = Category::with([
        'services' => function ($query) {

            $query->when($this->search, function ($q) {
                $q->where(
                    'name',
                    'like',
                    '%' . $this->search . '%'
                );
            });

            $query->when($this->status !== '', function ($q) {
                $q->where('active', $this->status);
            });

        }
    ])
    ->get()
    ->filter(fn($category) => $category->services->count() > 0);

    return view('livewire.admin.services', [
        'categories' => $categories
    ])->layout('components.layouts.admin');
}
}