<?php

declare(strict_types=1);

namespace SI\Shakti\onDemandPowers;

use SI\Krishna;

trait Siddha
{
    public static function getAvailableSiddhaDehas(): array
    {
        $base = dirname(__DIR__, 3);
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

    public static function setIstaDev()
    {
        $forms = Krishna::getForms(true);
        return $forms[array_rand($forms)];
    }

    public static function getRandomSiddhaDeha(string $istaDev)
    {
        // in real life there are unlimited types of siddha dehas...
        // but we will use a few here for our little demo purposes
        $siddhaDeha = null;
        $availableSiddhaDehas = static::getAvailableSiddhaDehas();
        foreach ($availableSiddhaDehas as $name) {
            $class = 'SI\Resources\Spirit\Identities\\' . $name;
            $sd = new $class();
            if (in_array($istaDev, $sd->support())) {
                $siddhaDeha = $sd;
                break;
            }
        }
        return new $siddhaDeha();
    }
}
