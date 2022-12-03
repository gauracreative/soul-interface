<?php

declare(strict_types=1);

namespace SI\Shakti;

use SI\Shakti\onDemandPowers\Incarnate as IncarnateTrait;
use SI\Resources\Matter\Modes\Mix as GunaMix;

class Bahiranga implements Shakti
{
    use IncarnateTrait;

    public const CONDITIONED_PHRASE = ' in nature, but temporarily identify/experience myself through mind and senses as ';
    private const NAMES = ['Bahiraṅga-śakti', 'Māyā-śakti', 'Pradhāna'];
    private const DESCRIPTION = 'external potency, material illusory energy that conditions living entities in this world';

    public function getName(): string
    {
        return static::NAMES[0];
    }

    public function getNames(): array
    {
        return static::NAMES;
    }

    public function getDescription(): string
    {
        return static::DESCRIPTION;
    }

    public function cloudSat(string $originalSat): string
    {
        return $originalSat . static::CONDITIONED_PHRASE . 'living a very finite life';
    }

    public function cloudCit(string $originalChit): string
    {
        return $originalChit . static::CONDITIONED_PHRASE . 'limited and ignorant about a number of things. Occasionally my pride might not let me admit most of that, but that is just another outcome of my ignorance.';
    }

    public function cloudAnanda(string $originalAnanda): string
    {
        return $originalAnanda . static::CONDITIONED_PHRASE . 'living a not very satisfying life. I do strive for success and happiness, but I do not have full eternal bliss.';
    }

    public static function coverRandomly(): self|false
    {
        return mt_rand(0, 1) ? new self() : false;
    }

    public static function getGunaMix(int $clarity): GunaMix
    {
        return new GunaMix($clarity);
    }
}
