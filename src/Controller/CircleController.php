<?php

/**
 * Circle geometry controller
 *
 * No mention of output formatting - arbitrarily selected 2 decimal places
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class CircleController
{
    protected const _PI = 22/7;
    protected const _TYPE = 'circle';

    /**
     * Return the response for the circle geo type
     *
     * @param float $radius
     * @return JsonResponse
     */
    public function index(float $radius): JsonResponse
    {
        return new JsonResponse([
            'type' => self::_TYPE,
            'radius' => $radius,
            'surface' => $this->calculateArea($radius),
            'circumference' => $this->calculateCircumference($radius)
        ]);
    }

    /**
     * Return the calculated area of the circle
     *
     * @param float $radius
     * @return float
     */
    public function calculateArea(float $radius): float {
        return sprintf('%01.2f', 2 * self::_PI * ($radius ^ 2));
    }

    /**
     * Return the calculated circumference of the circle
     *
     * @param float $radius
     * @return float
     */
    public function calculateCircumference(float $radius): float {
        return sprintf('%01.2f', 2 * self::_PI * ($radius * 2));
    }

}
