<?php

declare(strict_types=1);

namespace SI\Shakti;

use SI\Shakti\onDemandPowers\Incarnate;

class Bahiranga extends Incarnate implements Shakti
{
    public const CONDITIONED_PHRASE = ' in nature, but temporarily identify/experience myself through mind and senses as ';
    private const NAMES = ['Bahiraṅga-śakti', 'Māyā-śakti', 'Pradhāna'];
    private const DESCRIPTION = 'external potency, material illusiory energy that conditions living entities in this world';

    public function getName(): string
    {
        return self::NAMES[0];
    }

    public function getNames(): array
    {
        return self::NAMES;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function cloudSat(string $originalSat): string
    {
        return $originalSat . self::CONDITIONED_PHRASE . 'living a very finite life';
    }

    public function cloudCit(string $originalChit): string
    {
        return $originalChit . self::CONDITIONED_PHRASE . 'limitted and ignorant about a number of things. Ocasionally my pride might not let me admit most of that, but that is just another outcome of my ignorance.';
    }

    public function cloudAnanda(string $originalAnanda): string
    {
        return $originalAnanda . self::CONDITIONED_PHRASE . 'living a not very satisfying life. I do strive for success and happiness, but I do not have full eternal bliss.';
    }

    public static function coverRandomly(?bool $inforceMukta = null): self|false
    {
        if (is_null($inforceMukta)) {
            return mt_rand(0, 1) ? new self() : false;
        }
        return $inforceMukta ? false : new self();
    }
}
