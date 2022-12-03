<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

use SI\config;

final class Mix
{
    public Sattva $sattva;
    public Rajas $rajas;
    public Tamas $tamas;

    public function __construct(?int $level = 100)
    {
        $sattvaLevel = mt_rand(config::GUNA_LEVEL_MIN, config::GUNA_LEVEL_MAX);
        $rajasLevel = mt_rand(config::GUNA_LEVEL_MIN, intval(config::GUNA_LEVEL_MAX*$level/100));
        $tamasLevel = mt_rand(config::GUNA_LEVEL_MIN, intval(config::GUNA_LEVEL_MAX*$level/100));
        $this->sattva = new Sattva($sattvaLevel);
        $this->rajas = new Rajas($rajasLevel);
        $this->tamas = new Tamas($tamasLevel);
    }

    public function toArray(): array
    {
        return [
          'sattva' => $this->sattva->toArray(),
          'rajas' => $this->rajas->toArray(),
          'tamas' => $this->tamas->toArray(),
        ];
    }
}
