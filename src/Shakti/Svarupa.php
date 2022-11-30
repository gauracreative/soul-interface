<?php

declare(strict_types=1);

namespace SI\Shakti;

final class Svarupa implements Shakti
{
    private const DESCRIPTION = 'complete potency';

    private array $names = ['Svarūpa-śakti', 'Pārā-śakti'];

    public function __construct(string|array $shaktiNames = 'Śrīmatī Rādhikā')
    {
        $this->names = array_merge($this->names, (array) $shaktiNames);
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
        return self::DESCRIPTION;
    }

    public function cit(): Antaranga
    {
        return new Antaranga();
    }

    public function maya(): Bahiranga
    {
        return new Bahiranga();
    }

    public function jiva(): Tatastha
    {
        return new Tatastha();
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
