<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

final class Tamas implements Mode
{
    private string $color = 'blue';

    private int $level = 0;

    public function __construct(?int $level = null)
    {
        $this->level = $level ?? mt_rand(1, $_ENV['GUNA_LEVEL_MAX']);
    }

    public function getName(): string
    {
        return 'Tamas, ignorance';
    }

    public function getDescription(): ?string
    {
        return 'State of inaction, illusion';
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
