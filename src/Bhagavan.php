<?php

declare(strict_types=1);

namespace SI;

use SI\Shakti\Svarupa as SvarupaShakti;

class Bhagavan extends Divinity
{
    public readonly array $names;
    public readonly array $shaktiNames;

    // complete potency | Svarūpa-śakti
    public readonly SvarupaShakti $shakti;

    public function __construct(string|array $purushaNames, string|array $shaktiNames)
    {
        $this->names = (array) $purushaNames;
        $this->shaktiNames = (array) $shaktiNames;
        $this->shakti = SvarupaShakti::getInstance();
    }

    public function name(): string
    {
        return $this->names[0];
    }
}
