<div class="row">
    <div class="col-md-5">
        <x-card title="Registar Novo Cliente">
            <form wire:submit="save">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="location" class="form-label">Localidade</label>
                        <input type="text" class="form-control" id="location" wire:model="location">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="distance" class="form-label">Distância (kms)</label>
                        <input type="number" class="form-control" id="distance" wire:model="distance">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-primary">Criar cliente</button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>

    <div class="col-md-7">
        <x-card title="Clientes">
            <div class="row">
                @unless (empty($clients))
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Localidade</th>
                                <th scope="col">Distância</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->location }}</td>
                                    <td>{{ $client->distance }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endunless
            </div>
        </x-card>
    </div>
</div>
