<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Prema implements BhaktiAdhikar
{
    public function getName(): string
    {
        return 'Prema';
    }

    public function getDescription(): ?string
    {
        return 'Pure love of God, perfected Bhakti';
    }
}
