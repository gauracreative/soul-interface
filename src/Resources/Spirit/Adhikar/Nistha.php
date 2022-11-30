<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Nistha implements bhaktiAdhikar
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
