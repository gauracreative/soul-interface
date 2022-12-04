<?php

declare(strict_types=1);

namespace SI\Shakti;

final class Svarupa implements Shakti
{
    private const DESCRIPTION = 'complete potency';

    private array $names = ['Svarūpa-śakti', 'Pārā-śakti'];

    private static self $instance;

    public readonly Bahiranga $maya;

    public readonly Antaranga $cit;

    public readonly Tatastha $jiva;

    public function __construct()
    {
        $this->cit = new Antaranga();
        $this->maya = new Bahiranga();
        $this->jiva = new Tatastha();
    }

    public static function getInstance(): self
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
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
}
