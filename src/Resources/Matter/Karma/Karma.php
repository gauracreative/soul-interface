<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Karma;

final class Karma
{
    public int $seeds = 0;

    public int $fruits = 0;

    public function __construct()
    {
        $this->fruits = config('souli.karma.start');
    }

    public static function getPurusharthaLevels(): array
    {
        return array_keys(config('souli.karma.purushartha'));
    }

    public function getPurushartha(): ?string
    {
        $purushartha = null;
        foreach (config('souli.karma.purushartha') as $label => $level) {
            if ($this->seeds >= $level) {
                $purushartha = $label;
            } elseif ($purushartha) {
                break;
            }
        }

        return $purushartha;
    }
}
