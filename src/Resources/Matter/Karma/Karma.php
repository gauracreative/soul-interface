<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Karma;

final class Karma
{
    public int $seeds = 0;
    public int $fruits = KARMAPOINTS_START;

    public static function getPurusharthaLevels(): array
    {
        return array_keys(PURUSHARTHA);
    }

    public function getPurushartha(): ?string
    {
        $purushartha = null;
        foreach (PURUSHARTHA as $label => $level) {
            if ($this->seeds >= $level) {
                $purushartha = $label;
            } elseif ($purushartha) {
                break;
            }
        }
        return $purushartha;
    }
}
