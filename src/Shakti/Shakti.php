<?php

declare(strict_types=1);

namespace SI\Shakti;

interface Shakti
{
    public function getName(): string;

    public function getNames(): array;

    public function getDescription(): string;
}
