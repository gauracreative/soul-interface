<?php

declare(strict_types=1);

namespace SI\Shakti;

final class Svarupa extends Shakti
{
    protected const NAMES = ['Svarūpa-śakti', 'Pārā-śakti'];

    protected const DESCRIPTION = 'complete potency';

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
}
