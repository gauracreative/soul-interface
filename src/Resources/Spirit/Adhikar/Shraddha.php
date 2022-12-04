<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Shraddha implements BhaktiAdhikar
{
    public function getName(): string
    {
        return 'Shraddha';
    }

    public function getDescription(): ?string
    {
        return 'Initial faith... There is something to it. I want to learn more about this path of Bhakti..';
    }
}
