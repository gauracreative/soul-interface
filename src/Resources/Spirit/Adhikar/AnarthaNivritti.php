<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class AnarthaNivritti implements bhaktiAdhikar
{
    public function getName(): string
    {
        return 'Anartha-nivritti';
    }

    public function getDescription(): ?string
    {
        return 'decreasing of unwanted attachments';
    }
}
