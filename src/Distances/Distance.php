<?php


namespace Reflex\Neighbors\Distances;

abstract class Distance
{
    /**
     * @param float[] $a
     * @param float[] $b
     * @return float
     */
    public function distance(array $a, array $b): float {
        if (count($a) !== count($b)) {
            throw new \LengthException("Lengths in distance calculate function do not match.");
        }

        return $this->handle($a, $b);
    }

    /**
     * @param float[] $a
     * @param float[] $b
     * @return float
     */
    abstract public function handle(array $a, array $b): float;
}
