<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class SadhuSanga implements bhaktiAdhikar
{
    public function getName(): string
    {
        return 'Sadhu-sanga';
    }

    public function getDescription(): ?string
    {
        return 'Association with like-minded, with the desire to develop Bhakti..';
    }
}
