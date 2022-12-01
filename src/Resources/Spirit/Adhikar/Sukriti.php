<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Sukriti implements bhaktiAdhikar
{
    public function getName(): string
    {
        return 'Sukriti';
    }

    public function getDescription(): ?string
    {
        return 'gathering spiritual pious credits';
    }
}
