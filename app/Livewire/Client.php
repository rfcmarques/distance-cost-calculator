<?php

namespace App\Livewire;

use App\Models\Client as ModelsClient;
use Livewire\Component;

class Client extends Component
{
    public string $name = '';
    public string $location = '';
    public int $distance = 0;
    public $clients;

    public function render()
    {
        return view('livewire.client');
    }

    public function mount()
    {
        $this->clients = ModelsClient::all();
    }

    public function save()
    {
        ModelsClient::create(
            $this->only(['name', 'location', 'distance'])
        );

        return $this->redirect('/clients');
    }
}
