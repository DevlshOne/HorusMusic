<?php

/**
 * Geometry calculator controller
 *
 * Adaptable methods for geo type combining
 */

namespace App\Controller;

use App\Controller\ {
    CircleController,
    TriangleController
};

/**
 * Geometry calculator class
 * @todo Abstraction, Unit Tests, factory
 */
class GeometryCalculator
{
    /**
     * Add the areas of geo types (not limited to two)
     * Input array of geo arrays. [Triangle, Triangle, Triangle, Circle, Triangle, ...]
     * Triangle : ['params' => [13, 12, 17]]
     * Circle : ['params' => [18]]
     *
     * @param array $geos
     * @return float
     */
    public function addAreas(array $geos): float {
        $_total = 0;
        foreach($geos as $geo) {
            // This must be a circle
            if (sizeof($geo['params']) == 1) {
                $_circle_area = json_decode((new CircleController())->index($geo['params'][0]));
                $_total += $_circle_area['surface'];
            }
            // This must be a triangle
            if (sizeof($geo['params']) == 3) {
                $_triangle_area = json_decode((new TriangleController())->index($geo['params'][0], $geo['params'][1], $geo['params'][2]));
                $_total += $_triangle_area['surface'];
            }
            // Square...
            // Pentagon...
            // Hexagon...
        }
        return $_total;
    }

    /**
     * Add the perimeters of geo types (not limited to two)
     * Input array of geo arrays. [Triangle, Triangle, Triangle, Circle, Triangle, ...]
     * Triangle : ['params' => [13, 12, 17]]
     * Circle : ['params' => [18]]
     *
     * @param array $geos
     * @return float
     */
    public function addPerimeters(array $geos): float {
        $_total = 0;
        foreach($geos as $geo) {
            // This must be a circle
            if (sizeof($geo['params']) == 1) {
                $_circle_perim = json_decode((new CircleController())->index($geo['params'][0]));
                $_total += $_circle_perim['circumference'];
            }
            // This must be a triangle
            if (sizeof($geo['params']) == 3) {
                $_triangle_perim = json_decode((new TriangleController())->index($geo['params'][0], $geo['params'][1], $geo['params'][2]));
                $_total += $_triangle_perim['circumference'];
            }
            // Square...
            // Pentagon...
            // Hexagon...
        }
        return $_total;
    }

}