<?php

/**
 * Triangle geometry controller
 *
 * No mention of output formatting - arbitrarily selected 2 decimal places
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class TriangleController
{
    protected const _TYPE = 'triangle';

    /**
     * Return the response for the triangle geo type
     *
     * @param float $a
     * @param float $b
     * @param float $c
     * @return JsonResponse
     */
    public function index(float $a, float $b, float $c): JsonResponse
    {
        return new JsonResponse([
            'type' => self::_TYPE,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'surface' => $this->calculateArea($a, $b, $c),
            'circumference' => $this->calculateCircumference($a, $b, $c)
        ]);
    }

    /**
     * Return the calculated area of the triangle
     * Heron's formula
     *
     * @param float $a
     * @param float $b
     * @param float $c
     * @return float
     */
    public function calculateArea(float $a, float $b, float $c): float {
        $_semiperimeter = ($a + $b + $c) / 2;
        return sprintf('%01.2f', sqrt($_semiperimeter * ($_semiperimeter - $a) * ($_semiperimeter - $b) * ($_semiperimeter - $c)));
    }

    /**
     * Return the calculated perimeter of the triangle
     *
     * @param float $a
     * @param float $b
     * @param float $c
     * @return float
     */
    public function calculateCircumference(float $a, float $b, float $c): float {
        return sprintf('%01.2f', $a + $b + $c);
    }

}
