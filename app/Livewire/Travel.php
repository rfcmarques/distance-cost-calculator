<?php

namespace App\Livewire;

use Livewire\Component;

class Travel extends Component
{
    public int $kms = 0;
    public int $value = 0;
    public float $kmValue = 0.44;
    public array $destinations = [
        [
            'client' => 'XPTO 1',
            'distance' => 200
        ],
        [
            'client' => 'XPTO 2',
            'distance' => 123
        ],
        [
            'client' => 'XPTO 3',
            'distance' => 56
        ],
        [
            'client' => 'XPTO 4',
            'distance' => 700
        ],
        [
            'client' => 'XPTO 5',
            'distance' => 321
        ],
        [
            'client' => 'XPTO 6',
            'distance' => 105
        ],
    ];
    public array $idealRoute = [];


    public function render()
    {
        return view('livewire.travel');
    }

    public function findMyRoute()
    {
        $this->idealRoute = $this->findMatchingCombinations($this->destinations, $this->kms);
    }

    protected function getCombinations($array, $length)
    {
        $result = [];

        if ($length === 1) {
            foreach ($array as $element) {
                $result[] = [$element];
            }
        } else {
            foreach ($array as $key => $value) {
                $remaining = array_slice($array, $key + 1);
                foreach ($this->getCombinations($remaining, $length - 1) as $combination) {
                    array_unshift($combination, $value);
                    $result[] = $combination;
                }
            }
        }

        return $result;
    }

    protected function findMatchingCombinations($destinations, $targetDistance)
    {
        $allCombinations = [];
        for ($i = 1; $i <= count($destinations); $i++) {
            $allCombinations = array_merge($allCombinations, $this->getCombinations($destinations, $i));
        }

        $matchingCombinations = [];
        foreach ($allCombinations as $combination) {
            $sumDistances = array_sum(array_column($combination, 'distance'));
            if ($sumDistances === $targetDistance) {
                $matchingCombinations[] = $combination;
            }
        }

        return $matchingCombinations;
    }
}
