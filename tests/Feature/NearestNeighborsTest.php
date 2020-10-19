<?php


use Orchestra\Testbench\TestCase;
use Reflex\Neighbors\NearestNeighbors;

class NearestNeighborsTest extends TestCase
{
    /**
     * @test
     */
    public function test_nearest_neighbors()
    {
        $samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
        $labels = ['Joe', 'Joe', 'Joe', 'John', 'John', 'John'];

        $classifier = new NearestNeighbors();
        $classifier->train($samples, $labels);

        $this->assertEquals("John", $classifier->predict([3, 2]));
        $this->assertEquals("Joe", $classifier->predict([2, 3]));
    }
}
