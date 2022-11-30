<?php

declare(strict_types=1);

namespace SI\Shakti;

use SI\Shakti\onDemandPowers\Siddha as SiddhaTrait;
use SI\Resources\Matter\Modes\Mix as GunaMix;
use SI\Resources\Matter\Modes\Nirguna;
use SI\Jiva;

class Tatastha implements Shakti
{
    use SiddhaTrait;

    private const NAMES = ['Taṭasthā-śakti', 'Jīva-śakti'];
    private const DESCRIPTION = 'marginal potency';

    public function getName(): string
    {
        return self::NAMES[0];
    }

    public function getNames(): array
    {
        return self::NAMES;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function createJiva(?bool $mukta = null, ?string $siddhaDeha = null): Jiva
    {
        return new Jiva($mukta, $siddhaDeha);
    }

    public static function getJivaState(Jiva $jiva): GunaMix|Nirguna
    {
        if ($jiva->isMukta()) {
            return new Nirguna();
        } else {
            return Bahiranga::getGunaMix();
        }
    }
}
