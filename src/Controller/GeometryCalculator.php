<?php

/**
 * Geometry calculator controller
 *
 * Adaptable methods for geo type combining
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Controller\ {
    CircleController,
    TriangleController
};

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
                $_circlearea = json_decode((new CircleController($geo['params'][0]))->calculateArea());
                $_total += $_circlearea['surface'];
            }
            // This must be a triangle
            if (sizeof($geo['params']) == 3) {
                $_circlearea = json_decode((new TriangleController($geo['params'][0], $geo['params'][1], $geo['params'][2]))->calculateArea());
                $_total += $_circlearea['surface'];
            }
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
                $_circleperim = json_decode((new CircleController($geo['params'][0]))->calculateCircumference());
                $_total += $_circleperim['circumference'];
            }
            // This must be a triangle
            if (sizeof($geo['params']) == 3) {
                $_circleperim = json_decode((new TriangleController($geo['params'][0], $geo['params'][1], $geo['params'][2]))->calculateCircumference());
                $_total += $_circleperim['circumference'];
            }
        }
        return $_total;
    }

}