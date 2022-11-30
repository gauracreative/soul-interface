<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Ruchi implements bhaktiAdhikar
{
    public function getName(): string
    {
        return 'Ruchi';
    }

    public function getDescription(): ?string
    {
        return 'taste';
    }
}
