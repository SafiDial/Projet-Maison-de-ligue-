<div>
    <input type="text" wire:model="search" placeholder="Rechercher des produits..." class="form-control mb-3">

    <ul class="list-group">
        @foreach($products as $product)
            <li class="list-group-item">{{ $product->name }}</li>
        @endforeach
    </ul>
</div>