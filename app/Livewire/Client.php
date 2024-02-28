<?php

namespace App\Livewire;

use App\Models\Client as ModelsClient;
use Livewire\Component;

class Client extends Component
{
    public string $name = '';
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
            $this->only(['name', 'distance'])
        );

        return $this->redirect('/clients');
    }
}
