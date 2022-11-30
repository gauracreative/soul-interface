<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

final class Rajas implements Mode
{
    private string $color = 'red';

    private int $level = 0;

    public function __construct(?int $level = null)
    {
        $this->level = $level ?? mt_rand(1, $_ENV['GUNA_LEVEL_MAX']);
    }

    public function getName(): string
    {
        return 'Rajas, passion';
    }

    public function getDescription(): ?string
    {
        return 'State of result-oriented activity';
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
