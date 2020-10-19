<?php


namespace Reflex\Neighbors;


use Reflex\Neighbors\Distances\Distance;
use Reflex\Neighbors\Distances\Euclidean;
use Reflex\Neighbors\Helpers\Predictable;
use Reflex\Neighbors\Helpers\Trainable;

class NearestNeighbors
{
    use Trainable;
    use Predictable;

    /**
     * @var int
     */
    private $k;

    /**
     * @var Distance
     */
    private $metric;

    /**
     * NearestNeighbors constructor.
     * @param int $k
     * @param Distance|null $metric defaults to euclidean distance
     */
    public function __construct(int $k = 5, Distance $metric=null)
    {
        if (!$metric) {
            $metric = new Euclidean();
        }

        $this->k = $k;
        $this->samples = [];
        $this->targets = [];
        $this->metric = $metric;
    }

    protected function predictSample(array $sample)
    {
        $distances = $this->kNeighborsDistances($sample);
        $predictions = (array) array_combine(array_values($this->targets), array_fill(0, count($this->targets), 0));

        foreach (array_keys($distances) as $index) {
            ++$predictions[$this->targets[$index]];
        }

        arsort($predictions);
        reset($predictions);

        return key($predictions);

    }


    private function kNeighborsDistances(array $sample): array
    {
        $distances = [];

        foreach ($this->samples as $index => $neighbor) {
            $distances[$index] = $this->metric->distance($sample, $neighbor);
        }

        asort($distances);

        return array_slice($distances, 0, $this->k, true);
    }

}
