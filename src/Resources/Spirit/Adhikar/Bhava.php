<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Bhava implements BhaktiAdhikar
{
    public function getName(): string
    {
        return 'Bhava';
    }

    public function getDescription(): ?string
    {
        return 'love';
    }
}
