<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;
use App\Models\Category;

class Services extends Component
{
    public $showModal = false;

    public $category_id;
    public $name;
    public $pricing_type = 'fixed';
    public $base_price;

    public $categories;

    public function mount()
    {
        $this->categories = Category::with('services')->get();
    }

    public function openModal()
    {
        $this->reset([
            'category_id',
            'name',
            'pricing_type',
            'base_price'
        ]);

        $this->pricing_type = 'fixed';
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'category_id' => 'required',
            'name' => 'required',
            'pricing_type' => 'required',
            'base_price' => 'required|numeric',
        ]);

        Service::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'pricing_type' => $this->pricing_type,
            'base_price' => $this->base_price,
        ]);

        $this->categories = Category::with('services')->get();
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.admin.services')
            ->layout('components.layouts.admin');
    }
}