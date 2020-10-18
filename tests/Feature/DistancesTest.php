<?php


namespace Reflex\Tests\Feature;


use Orchestra\Testbench\TestCase;
use Reflex\Neighbors\Distances\Chebyshev;
use Reflex\Neighbors\Distances\Euclidean;
use Reflex\Neighbors\Distances\Manhattan;
use Reflex\Neighbors\Distances\Minkowski;

class DistancesTest extends TestCase
{
    /**
     * @test
     */
    public function test_euclidean_distance()
    {
        $euclidean = new Euclidean();
        $this->assertEquals(1, $euclidean->distance([3], [4]));
        $this->assertEquals(sqrt(5), $euclidean->distance([4, 6], [2, 5]));
        $this->assertEquals(sqrt(218), $euclidean->distance([9, 10, 13], [2, 5, 1]));
    }

    /**
     * @test
     */
    public function test_manhattan_distance()
    {
        $manhattan = new Manhattan();
        $this->assertEquals(3, $manhattan->distance([4, 6], [2, 5]));
        $this->assertEquals(9, $manhattan->distance([2, 6, 5, 8], [4, 9, 1, 8]));
    }

    /**
     * @test
     */
    public function test_chebyshev_distance()
    {
        $chebyshev = new Chebyshev();
        $this->assertEquals(2, $chebyshev->distance([4, 6], [2, 5]));
        $this->assertEquals(7, $chebyshev->distance([1, 9, 8, 2, 5], [6, 4, 1, 3, 12]));
    }

    /**
     * @test
     */
    public function test_minkowski_distance()
    {
        $minkowski = new Minkowski();
        $a = [6,2,1,4,8,9];
        $b = [1,8,4,3,2,1];

        $this->assertEquals(pow(9, 1 / 3), $minkowski->distance([4, 6], [2, 5]));
        $this->assertEquals(pow(1097, 1/3), $minkowski->distance($a, $b));

        $minkowski = new Minkowski(2);
        $this->assertEquals((new Euclidean())->distance($a, $b), $minkowski->distance($a, $b));

        $minkowski = new Minkowski(1);
        $this->assertEquals((new Manhattan())->distance($a, $b), $minkowski->distance($a, $b));
    }

}
