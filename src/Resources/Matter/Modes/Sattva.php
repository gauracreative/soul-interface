<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

final class Sattva implements Mode
{
    private string $color = 'yellow';

    private int $level = 0;

    public function __construct(?int $level = null)
    {
        $this->level = $level ?? mt_rand(1, $_ENV['GUNA_LEVEL_MAX']);
    }

    public function getName(): string
    {
        return 'Sattva, goodness';
    }

    public function getDescription(): ?string
    {
        return 'Quality of goodness, selflessness, truth, knowledge, peace, harmony, creativity, and positivity. It is a quality of living a peaceful and meaningful way of life.';
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
