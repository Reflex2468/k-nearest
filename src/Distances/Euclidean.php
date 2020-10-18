<?php


namespace Reflex\Neighbors\Distances;

class Euclidean extends Distance
{
    public function handle(float $a, $b): float
    {
        return pow($a, 2) + pow($b, 2);
    }
}
