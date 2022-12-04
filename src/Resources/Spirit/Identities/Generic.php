<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Identities;

class Generic extends SiddhaDeha
{
    private const NAME = 'Generic Siddha Deha';

    public function getName(): string
    {
        return static::NAME;
    }
}
