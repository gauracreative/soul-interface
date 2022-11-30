<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

interface bhaktiAdhikar
{
    public function getName(): string;

    public function getDescription(): ?string;
}
