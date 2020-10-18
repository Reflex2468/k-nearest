<?php


namespace Reflex\Neighbors\Distances;

abstract class Distance
{
    /**
     * @param float[] $a
     * @param float[] $b
     * @return float
     */
    public function calculate(array $a, array $b): float {
        if (count($a) !== count($b)) {
            throw new \LengthException("Lengths in distance calculate function do not match.");
        }

        $sum = 0;
        for ($i = 0; $i < count($a); $i++) {
            $sum += $this->handle($a[$i], $b[$i]);
        }
        return $sum;
    }

    /**
     * @param float $a
     * @param float $b
     * @return double
     */
    abstract public function handle(float $a, float $b): float;
}
