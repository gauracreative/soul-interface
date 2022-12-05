<?php

declare(strict_types=1);

namespace SI\Shakti\onDemandPowers;

trait Incarnate
{
    public static function getAvailableBodies(): array
    {
        $base = dirname(__DIR__, 3);
        $dir = $base.'/src/Resources/Matter/Bodies/*.php';
        $availableBodies = array_filter(
            glob($dir),
            function ($path) {
                $path_parts = pathinfo($path);

                return $path_parts['basename'] != 'Body';
            }
        );
        $availableBodies = array_map(function ($path) {
            $path_parts = pathinfo($path);

            return $path_parts['filename'];
        }, glob($dir));
        $availableBodies = array_filter(
            $availableBodies,
            function ($class) {
                return $class != 'Body';
            }
        );

        return array_values($availableBodies);
    }

    public static function getRandomBody()
    {
        // in real life there are about 8,400,000 only types of bodies...
        // but we will use a few here for our little demo purposes
        $availableBodies = static::getAvailableBodies();
        $bodyClass = 'SI\Resources\Matter\Bodies\\'.$availableBodies[array_rand($availableBodies)];

        return new $bodyClass();
    }
}
