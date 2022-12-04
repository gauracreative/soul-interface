<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Nistha implements BhaktiAdhikar
{
    public function getName(): string
    {
        return 'Nistha';
    }

    public function getDescription(): ?string
    {
        return 'steadiness';
    }
}
