<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Identities;

class Sakha extends SiddhaDeha
{
    private const NAME = 'Sakha';

    public function getName(): string
    {
        return static::NAME;
    }

    public function support(): array
    {
        return ['krsna'];
    }
}
