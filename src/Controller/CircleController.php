<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class CircleController
{
    protected const _PI = 22/7;
    protected const _TYPE = 'circle';

    public function index(int $radius): JsonResponse
    {
        return new JsonResponse([
            'type' => self::_TYPE,
            'radius' => $radius,
            'surface' => $this->calculateArea($radius),
            'circumference' => $this->calculateCircumference($radius)
        ]);
    }

    protected function calculateArea(int $radius): float {
        return 2 * self::_PI * $radius^2;
    }

    protected function calculateCircumference(int $radius): float {
        return 2 * self::_PI * ($radius * 2);
    }

}
