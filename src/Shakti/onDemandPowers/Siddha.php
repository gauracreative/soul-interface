<?php

declare(strict_types=1);

namespace SI\Shakti\onDemandPowers;

trait Siddha
{
    public static function getAvailableSiddhaDehas(): array
    {
        $base = $_ENV['ROOT_PATH'] ?? dirname(__DIR__, 3);
        $dir =$base.'/src/Resources/Spirit/Identities/*.php';
        $availableSiddhaDehas = array_filter(
            glob($dir),
            function ($path) {
                $path_parts = pathinfo($path);

                return $path_parts['basename'] != 'SiddhaDeha';
            }
        );
        $availableSiddhaDehas = array_map(function ($path) {
            $path_parts = pathinfo($path);

            return $path_parts['filename'];
        }, glob($dir));
        $availableSiddhaDehas = array_filter(
            $availableSiddhaDehas,
            function ($class) {
                return $class != 'SiddhaDeha';
            }
        );
        return array_values($availableSiddhaDehas);
    }

    public static function getRandomSiddhaDeha()
    {
        // in real life there are unlimited types of siddha dehas...
        // but we will use a few here for our little demo purposes
        $availableSiddhaDehas = self::getAvailableSiddhaDehas();
        $randomIndex = \count($availableSiddhaDehas) > 1 ? mt_rand(0, \count($availableSiddhaDehas) - 1) : 0;
        $bodyClass = 'SI\Resources\Spirit\Identities\\' . $availableSiddhaDehas[$randomIndex];
        return new $bodyClass();
    }
}
