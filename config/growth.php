<?php

return [
    'male' => [
        [
            'age' => 0,
            'severely_underweight' => [0, 2.1],
            'underweight' => [2.2, 2.4],
            'normal' => [2.5, 4.4],
            'overweight' => [4.5, PHP_INT_MAX],
        ],
        [
            'age' => 1,
            'severely_underweight' => [0, 2.9],
            'underweight' => [3.0, 3.3],
            'normal' => [3.4, 5.8],
            'overweight' => [5.9, PHP_INT_MAX],
        ],

    ],
    'female' => [
        [
            'age' => 0,
            'severely_underweight' => [0, 2.0],
            'underweight' => [2.1, 2.3],
            'normal' => [2.4, 4.2],
            'overweight' => [4.3, PHP_INT_MAX],
        ],
        [
            'age' => 1,
            'severely_underweight' => [0, 2.7],
            'underweight' => [2.8, 3.1],
            'normal' => [3.2, 4.5],
            'overweight' => [4.6, PHP_INT_MAX],
        ],
    ]
];
