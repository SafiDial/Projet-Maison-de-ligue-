<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collaborateur;

class CollaborateursList extends Component
{
    use WithPagination;

    public $search = '';
    public $service = '';
    public $city = '';
    public $country = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'service' => ['except' => ''],
        'city' => ['except' => ''],
        'country' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $collaborateurs = Collaborateur::query()
            ->when($this->search, fn($q) => $q->where('name', 'LIKE', "%{$this->search}%"))
            ->when($this->service, fn($q) => $q->where('service', $this->service))
            ->when($this->city, fn($q) => $q->where('city', $this->city))
            ->when($this->country, fn($q) => $q->where('country', $this->country))
            ->paginate(10);

        return view('livewire.collaborateurs-list', [
            'collaborateurs' => $collaborateurs,
            'services' => Collaborateur::distinct()->pluck('service'),
            'cities' => Collaborateur::distinct()->pluck('city'),
            'countries' => Collaborateur::distinct()->pluck('country')
        ]);
    }
}