<?php


namespace Reflex\Neighbors\Distances;


class Chebyshev extends Distance
{
    public function handle(array $a, array $b): float
    {
        $sums = collect();
        for ($i = 0; $i < count($a); $i++) {
            $sum = abs($a[$i] - $b[$i]);
            $sums->push($sum);
        }
        return $sums->max();
    }
}
