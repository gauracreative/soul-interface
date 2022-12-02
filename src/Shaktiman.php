<?php

declare(strict_types=1);

namespace SI;

use SI\Shakti\Svarupa as SvarupaShakti;

abstract class Shaktiman extends Divinity
{
    // complete potency | Svarūpa-śakti
    public readonly SvarupaShakti $shakti;

    public function __construct(string|array $shaktiNames = 'Śrīmatī Rādhikā')
    {
        parent::__construct();
        $this->shakti = new SvarupaShakti($shaktiNames);
    }
}
