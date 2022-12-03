<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

use SI\config;

final class Nirguna extends Mode
{
    protected const NAME = 'Nirguna, pure goodness';
    protected const DESCRIPTION = 'Pure state, boundless happiness';

    public function getLevel(): int
    {
        return config::GUNA_LEVEL_MAX;
    }
}
