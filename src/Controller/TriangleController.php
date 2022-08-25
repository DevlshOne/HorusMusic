<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class TriangleController
{
    protected const _TYPE = 'triangle';

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

    // Heron's formula
    protected function calculateArea(float $a, float $b, float $c): float {
        $_semiperimeter = ($a + $b + $c) / 2;
        return sqrt($_semiperimeter * ($_semiperimeter - $a) * ($_semiperimeter - $b) * ($_semiperimeter - $c));
    }

    protected function calculateCircumference(float $a, float $b, float $c): float {
        return $a + $b + $c;
    }

}
