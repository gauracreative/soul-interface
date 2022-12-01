<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

abstract class Mode
{
    protected const NAME = 'guna';
    protected const DESCRIPTION = 'mode';
    protected const COLOR = 'yellow';

    protected int $level;

    public function __construct(int $level)
    {
        $this->level = $level;
    }

    public function getName(): string
    {
        return static::NAME;
    }

    public function getDescription(): string
    {
        return static::DESCRIPTION;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getColor(): string
    {
        return static::COLOR;
    }

    public function toArray(): array
    {
        return [
          'name' => $this->getName(),
          'description' => $this->getDescription(),
          'color' => $this->getColor(),
          'level' => $this->getLevel(),
        ];
    }
}
