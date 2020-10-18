<?php


namespace Reflex\Neighbors\Distances;

class Euclidean implements Distance
{
    public function handle(array $a, array $b)
    {
        $sum = 0;
        foreach ($a as $n) {
            foreach ($b as $n2) {
                $sum += pow($n, 2) + pow($n2, 2);
            }
        }
        return sqrt($sum);
    }
}
