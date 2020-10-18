<?php


namespace Reflex\Neighbors\Distances;


class Minkowski extends Distance
{
    /**
     * @var float
     */
    public $lambda;

    public function __construct(float $lambda=3)
    {
        $this->lambda = $lambda;
    }

    public function handle(array $a, array $b): float
    {
        $sum = 0;
        for ($i = 0; $i < count($a); $i++) {
            $sum += pow(abs($a[$i] - $b[$i]), $this->lambda);
        }
        return pow($sum, 1 / $this->lambda);
    }
}
