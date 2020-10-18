<?php


namespace Reflex\Neighbors\Distances;


class Manhattan extends Distance
{
    public function handle(float $a, $b): float
    {
        return $a-$b;
    }
}
