<?php

declare(strict_types=1);

namespace SI\Shakti\onDemandPowers;

abstract class Incarnate
{
    public static function getAvailableBodies(): array
    {
        $base = $_ENV['ROOT_PATH'] ?? dirname(__DIR__, 3);
        $dir =$base.'/src/Resources/Matter/Bodies/*.php';
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
        $availableBodies = self::getAvailableBodies();
        $randomIndex = \count($availableBodies) > 1 ? mt_rand(0, \count($availableBodies) - 1) : 0;
        $bodyClass = 'SI\Resources\Matter\Bodies\\' . $availableBodies[$randomIndex];
        return new $bodyClass();
    }
}
