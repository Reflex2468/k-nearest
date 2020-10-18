<?php


namespace Reflex\Neighbors\Distances;


class Manhattan extends Distance
{
    public function handle(array $a, array $b): float
    {
        $sum = 0;
        for ($i = 0; $i < count($a); $i++) {
            $sum += abs($a[$i] - $b[$i]);
        }
        return $sum;
    }
}
