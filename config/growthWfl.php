<?php

return [
    'male' => [
        [
            'length' => 45.0,
            'sam' => [0, 1.8],
            'mam' => [1.9, 1.9],
            'normal' => [2.0, 3.0],
            'overweight' => [3.1, 3.3],
            'obese' => [3.4, PHP_INT_MAX],
        ],
        [
            'length' => 45.5,
            'sam' => [0, 1.8],
            'mam' => [1.9, 2.0],
            'normal' => [2.1, 3.1],
            'overweight' => [3.2, 3.4],
            'obese' => [3.5, PHP_INT_MAX],
        ],

    ],
    'female' => [
        [
            'length' => 45.0,
            'sam' => [0, 1.8],
            'mam' => [1.9, 2.0],
            'normal' => [2.1, 3.0],
            'overweight' => [3.1, 3.3],
            'obese' => [3.4, PHP_INT_MAX],
        ],
        [
            'length' => 45.5,
            'sam' => [0, 1.9],
            'mam' => [2.0, 2.0],
            'normal' => [2.1, 3.1],
            'overweight' => [3.2, 3.4],
            'obese' => [3.5, PHP_INT_MAX],
        ],
    ]
];
