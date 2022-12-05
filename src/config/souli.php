<?php

return [

    'gunas' => [
        'max' => env('SI_GUNAS_MAX', 255),
        'min' => env('SI_GUNAS_MIN', 25),
    ],
    'jivas_count' => env('SI_JIVAS_COUNT', 108),
    'human_lifespan' => env('SI_HUMAN_LIFESPAN', 82),
    'karma' => [
        'start' => env('SI_KARMAPOINTS_START', 300),
        'top' => env('SI_KARMAPOINTS_TOP', 1500),
        'purushartha' => [
            'Dharma' => env('SI_PURUSHARTHA_DHARMA', 300),
            'Artha' => env('SI_PURUSHARTHA_ARTHA', 600),
            'Kama' => env('SI_PURUSHARTHA_KAMA', 900),
            'Moksha' => env('SI_PURUSHARTHA_MOKSHA', 1200),
        ],
    ],

];
