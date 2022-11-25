<?php

namespace GodAPI\Shakti;

class Tatastha implements Shakti
{
    private const NAME = 'Taṭasthā-śakti a.k.a. Jīva-śakti';
    private const DESCRIPTION = 'marginal potency';
    private const CONDITIONED_PHRASE = ', but being conditioned/covered identify/experience myself through mind and senses as ';

    public function getName(): string
    {
        return self::NAME;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function cloudSat(string $originalSat): string
    {
        return $originalSat . self::CONDITIONED_PHRASE . 'temporary';
    }

    public function cloudCit(string $originalChit): string
    {
        return $originalChit . self::CONDITIONED_PHRASE . 'limitted and ignorant. My pride might not let me admit most of that, but this is just another outcome of my ignorance.';
    }

    public function cloudAnanda(string $originalAnanda): string
    {
        return $originalAnanda . self::CONDITIONED_PHRASE . 'measurable, and if only striving for success and happiness.';
    }
}
