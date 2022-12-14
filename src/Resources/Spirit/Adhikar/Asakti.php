<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class Asakti implements BhaktiAdhikar
{
    public function getName(): string
    {
        return 'Asakti';
    }

    public function getDescription(): ?string
    {
        return 'attachment';
    }
}
