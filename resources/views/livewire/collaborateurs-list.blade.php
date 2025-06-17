<div>
    <!-- Barre de recherche et filtres -->
    <div class="filters">
        <input wire:model.debounce.300ms="search" placeholder="Rechercher par nom...">
        
        <select wire:model="service">
            <option value="">Tous services</option>
            @foreach($services as $s)
                <option value="{{ $s }}">{{ $s }}</option>
            @endforeach
        </select>

        <select wire:model="city">
            <option value="">Toutes villes</option>
            @foreach($cities as $c)
                <option value="{{ $c }}">{{ $c }}</option>
            @endforeach
        </select>
    </div>

    <!-- Liste des collaborateurs -->
    <div class="collaborateurs-grid">
        @foreach($collaborateurs as $collaborateur)
            <div class="collaborateur-card">
                <img src="{{ $collaborateur->photo_url }}" alt="{{ $collaborateur->name }}">
                <h3>{{ $collaborateur->name }}</h3>
                <p>{{ $collaborateur->service }} - {{ $collaborateur->city }}</p>
                
                @if(auth()->user()->isAdmin)
                    <button wire:click="edit({{ $collaborateur->id }})">Éditer</button>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    {{ $collaborateurs->links() }}
</div>