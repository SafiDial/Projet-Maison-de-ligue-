<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product; // Supposons que vous ayez un modèle Product

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.search', ['products' => $products]);
    }
}
