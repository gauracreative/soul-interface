<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Karma;

use SI\config;

final class Karma
{
    public int $seeds = 0;
    public int $fruits = config::KARMAPOINTS_START;

    public static function getPurusharthaLevels(): array
    {
        return array_keys(config::PURUSHARTHA);
    }

    public function getPurushartha(): ?string
    {
        $purushartha = null;
        foreach (config::PURUSHARTHA as $label => $level) {
            if ($this->seeds >= $level) {
                $purushartha = $label;
            } elseif ($purushartha) {
                break;
            }
        }
        return $purushartha;
    }
}
