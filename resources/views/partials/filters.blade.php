<div class="search-filter">
        <form action="{{ auth()->user()->isAdmin ? route('collaborateurs.index') : route('collaborateurs.index_user') }}" method="GET">

        <div class="filter-options">

            {{--**** Filtre par service ****--}}
            <div class="filter-group">
                <label for="service">Service :</label>
                <select name="service" id="service" class="filter-select">
                    <option value=""></option>
                    @foreach($services as $service)
                        <option value="{{ $service }}" {{ request('service') == $service ? 'selected' : '' }}>{{ $service }}</option>
                    @endforeach
                </select>
            </div>

            {{--**** Filtre par ville ****--}}
            <div class="filter-group">
                <label for="city">Ville :</label>
                <select name="city" id="city" class="filter-select">
                    <option value=""></option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            {{--**** Filtre par pays ****--}}
            <div class="filter-group">
                <label for="country">Pays :</label>
                <select name="country" id="country" class="filter-select">
                    <option value=""></option>
                    @foreach($countries as $country)
                        <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
            </div>

            {{--**** Bouton filtrer ****--}}
            <div class="filter-group filter-buttons">
                <button type="submit" class="filter-button">Filtrer</button>

                @if(auth()->user()->isAdmin)
                    <a href="{{ route('collaborateurs.create') }}" class="add-button" title="Ajouter un collaborateur">+</a>
                @endif
            </div>

        </div>
    </form>
</div>
