<div>
    <div class="filter-section">
        <input type="text" wire:model.live="search" placeholder="Filtrer par nom" class="filter-input">

        <input type="text" wire:model.live="service" placeholder="Filtrer par service" class="filter-input">

        <input type="text" wire:model.live="country" placeholder="Filtrer par pays" class="filter-input">
    </div>

    <div class="collaborateurs-grid">
        @forelse($collaborateurs as $collaborateur)
            <div class="collaborateur">
                <img src="{{ file_exists(public_path('storage/' . $collaborateur->photo))
                        ? asset('storage/' . $collaborateur->photo)
                        : asset('images/default.webp') }}"
                    alt="{{ $collaborateur->name }}"
                    class="collaborateur-image">

                <div class="collaborateur-info">
                    <p><i class="fas fa-user"></i> Nom: {{ $collaborateur->name }}</p>
                    <p><i class="fas fa-briefcase"></i> Service: {{ $collaborateur->service }}</p>
                    <p><i class="fas fa-city"></i> Ville: {{ $collaborateur->city }}</p>
                    <p><i class="fas fa-flag"></i> Pays: {{ $collaborateur->country }}</p>
                </div>

                <div class="collaborateur-actions">
                    @if(Auth::user()->isAdmin)
                        <a href="{{ route('collaborateurs.edit', $collaborateur->id) }}" class="edit-button">Éditer</a>
                        <form action="{{ route('collaborateurs.destroy', $collaborateur->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Supprimer ce collaborateur ?')">Supprimer</button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p>Aucun collaborateur trouvé.</p>
        @endforelse
    </div>

    {{-- Suppression de la pagination ici : {{ $collaborateurs->links() }} --}}

</div>