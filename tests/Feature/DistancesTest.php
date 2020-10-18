<?php


namespace Reflex\Tests\Feature;


use Orchestra\Testbench\TestCase;
use Reflex\Neighbors\Distances\Euclidean;

class DistancesTest extends TestCase
{
    /**
     * @test
     */
    public function test_euclidean_distance()
    {
        $euclidean = new Euclidean();
        $this->assertEquals(5, $euclidean->handle([3], [4]));
    }

}
