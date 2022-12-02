<?php

declare(strict_types=1);

namespace SI\Shakti;

final class Svarupa implements Shakti
{
    private const DESCRIPTION = 'complete potency';

    private array $names = ['Svarūpa-śakti', 'Pārā-śakti'];

    public readonly Bahiranga $maya;
    public readonly Antaranga $cit;
    public readonly Tatastha $jiva;

    public function __construct(string|array $shaktiNames = 'Śrīmatī Rādhikā')
    {
        $this->names = array_merge($this->names, (array) $shaktiNames);
        $this->cit = new Antaranga();
        $this->maya = new Bahiranga();
        $this->jiva = new Tatastha();
    }

    public function getName(): string
    {
        return $this->names[0];
    }

    public function getNames(): array
    {
        return $this->names;
    }

    public function getDescription(): string
    {
        return static::DESCRIPTION;
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
