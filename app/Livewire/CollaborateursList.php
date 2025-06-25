<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collaborateur;

class CollaborateursList extends Component
{
    use WithPagination;

    public $search = ''; // Pour le nom
    public $service = ''; // Sera un champ texte
    public $country = ''; // Sera un champ texte
    // Suppression de public $city;

    protected $queryString = [
        'search' => ['except' => ''],
        'service' => ['except' => ''],
        // Suppression de 'city' => ['except' => ''],
        'country' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingService()
    {
        $this->resetPage();
    }

    // Suppression de la méthode public function updatingCity()
    // {
    //     $this->resetPage();
    // }

    public function updatingCountry()
    {
        $this->resetPage();
    }

    public function render()
    {
        $collaborateurs = Collaborateur::query()
            ->when($this->search, fn($q) => $q->where('name', 'LIKE', "%{$this->search}%"))
            ->when($this->service, fn($q) => $q->where('service', 'LIKE', "%{$this->service}%")) // Utilisez LIKE pour la recherche partielle
            // Suppression de ->when($this->city, fn($q) => $q->where('city', $this->city))
            ->when($this->country, fn($q) => $q->where('country', 'LIKE', "%{$this->country}%")) // Utilisez LIKE pour la recherche partielle
            ->paginate(10);

        return view('livewire.collaborateurs-list', [
            'collaborateurs' => $collaborateurs,
            
        ]);
    }
}