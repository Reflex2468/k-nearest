<?php


namespace Reflex\Neighbors\Distances;

class Euclidean extends Distance
{
    public function handle(array $a, array $b): float
    {
        $sum = 0;
        for ($i = 0; $i < count($a); $i++) {
            $sum += pow($a[$i], 2) + pow($b[$i], 2);
        }
        return $sum;
    }
}
