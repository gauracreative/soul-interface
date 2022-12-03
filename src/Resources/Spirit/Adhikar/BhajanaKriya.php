<?php

declare(strict_types=1);

namespace SI\Resources\Spirit\Adhikar;

final class BhajanaKriya implements BhaktiAdhikar
{
    public function getName(): string
    {
        return 'Bhajana-kriya';
    }

    public function getDescription(): ?string
    {
        return 'performance of devotional service';
    }
}
