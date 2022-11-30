<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

interface Mode
{
    public function getName(): string;

    public function getDescription(): ?string;

    public function getLevel(): int;
}
