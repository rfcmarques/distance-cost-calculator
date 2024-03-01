<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = base_path(env('CLIENTS_JSON'));

        if (File::exists($jsonFile)) {
            $jsonData = File::get($jsonFile);
            $clients = json_decode($jsonData);

            foreach ($clients as $client) {
                Client::create([
                    'name' => $client->name,
                    'location' => $client->local,
                    'distance' => $client->km
                ]);
            }
        }
    }
}
