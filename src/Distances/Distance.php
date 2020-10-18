<?php


namespace Reflex\Neighbors\Distances;

interface Distance
{
    /**
     * @param double[] $a
     * @param double[] $b
     * @return double
     */
    public function handle(array $a, array $b);
}
