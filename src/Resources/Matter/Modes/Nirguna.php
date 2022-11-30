<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

final class Nirguna implements Mode
{
    private string $color = 'green';

    private int $level;

    public function getName(): string
    {
        return 'Nirguna, pure goodness';
    }

    public function getDescription(): ?string
    {
        return 'Pure state, happiness';
    }

    public function getLevel(): int
    {
        return $_ENV['GUNA_LEVEL_MAX'];
    }
}
