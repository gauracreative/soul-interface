<?php

declare(strict_types=1);

namespace SI\Shakti;

use SI\Shakti\onDemandPowers\Siddha;
use SI\Jiva;

class Tatastha extends Siddha implements Shakti
{
    private const NAMES = ['Taṭasthā-śakti', 'Jīva-śakti'];
    private const DESCRIPTION = 'marginal potency';
    private const CONDITIONED_PHRASE = ', but being conditioned/covered identify/experience myself through mind and senses as ';

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
}
