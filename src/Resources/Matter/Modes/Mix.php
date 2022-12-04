<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Modes;

final class Mix
{
    public Sattva $sattva;

    public Rajas $rajas;

    public Tamas $tamas;

    public function __construct(?int $level = 100)
    {
        $sattvaLevel = mt_rand(config('souli.gunas.min'), config('souli.gunas.max'));
        $rajasLevel = mt_rand(config('souli.gunas.min'), $this->gunaMax($level));
        $tamasLevel = mt_rand(config('souli.gunas.min'), $this->gunaMax($level));
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

    private function gunaMax(int $level): int
    {
        return intval(config('souli.gunas.min') + $level * (config('souli.gunas.max') - config('souli.gunas.min')) / 100);
    }
}
