<?php

declare(strict_types=1);

namespace SI\Shakti;

class Antaranga implements Shakti
{
    private const NAMES = ['Antaraṅga-śakti', 'Cit-śakti'];
    private const DESCRIPTION = 'internal potency';

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
}
