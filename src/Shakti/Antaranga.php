<?php

namespace GodAPI\Shakti;

class Antaranga implements Shakti
{
    private const NAME = 'Antaraṅga-śakti a.k.a. Cit-śakti';
    private const DESCRIPTION = 'internal potency';

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
        return $originalSat;
    }

    public function cloudCit(string $originalChit): string
    {
        return $originalChit;
    }

    public function cloudAnanda(string $originalAnanda): string
    {
        return $originalAnanda;
    }
}
