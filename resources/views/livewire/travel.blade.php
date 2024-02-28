<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3>Calcular distância</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Quantidade de kms</label>
                    <div class="input-group mb-3">
                        <input type="number" name="" id="" class="form-control" wire:model.live="kms">
                        <span class="input-group-text">kms</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Quantidade valor em euros</label>
                    <div class="input-group mb-3">
                        <input type="number" name="" id="" class="form-control" wire:model="value">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
                <div class="hstack gap-3">
                    <button class="btn btn-primary" wire:click="findMyRoute">Find my route by distance</button>
                    <button class="btn btn-primary" wire:click="findMyRoute">Find my route by value</button>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($idealRoute))
        <div class="d-flex-column mt-5">
            <h3>Use the following route:</h3>

            @foreach ($idealRoute as $key => $route)
                <h5>Rota {{ $key + 1 }}</h5>
                <p>You should visit the following destinations:</p>
                <ul>
                    @foreach ($route as $destination)
                        <li>Client {{ $destination['client'] }} with a distance of {{ $destination['distance'] }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    @endif
</div>
