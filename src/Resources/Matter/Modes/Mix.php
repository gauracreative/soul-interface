<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

final class Mix
{
    public Sattva $sattva;
    public Rajas $rajas;
    public Tamas $tamas;

    public function __construct(?int $sattvaLevel = null, ?int $rajasLevel = null, ?int $tamasLevel = null)
    {
        $this->sattva = new Sattva($sattvaLevel);
        $this->rajas = new Rajas($rajasLevel);
        $this->tamas = new Tamas($tamasLevel);
    }
}
