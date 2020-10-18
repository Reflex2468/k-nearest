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
        $this->assertEquals(1, $euclidean->handle([3], [4]));
        $this->assertEquals(sqrt(5), $euclidean->handle([4,6], [2,5]));
        $this->assertEquals(sqrt(218), $euclidean->handle([9,10,13], [2,5,1]));
    }

}
