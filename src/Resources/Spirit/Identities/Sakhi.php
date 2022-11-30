<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Identities;

class Sakhi extends SiddhaDeha
{
    private const NAME = 'Sakhi';

    public function getName(): string
    {
        return self::NAME;
    }
}
