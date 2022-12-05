<?php

declare(strict_types=1);

namespace SI\Shakti;

abstract class Shakti
{
    protected const NAMES = ['śakti'];

    protected const DESCRIPTION = 'energy';

    public function getName(): string
    {
        return static::NAMES[0];
    }

    public function getNames(?bool $asString = false): string|array
    {
        return $asString ? implode(' a.k.a. ', static::NAMES) : static::NAMES;
    }

    public function getDescription(): string
    {
        return static::DESCRIPTION;
    }
}
