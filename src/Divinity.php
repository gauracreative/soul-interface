<?php

declare(strict_types=1);

namespace SI;

use Dotenv\Dotenv;

abstract class Divinity
{
    public const SAT_STATE = 'I am eternal';
    public const CIT_STATE = 'I am full of knowledge';
    public const ANANDA_STATE = 'I am full of bliss';

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        $_ENV['ROOT_PATH'] = dirname(__DIR__);
        $_ENV['GUNA_LEVEL_MAX'] = 100;
    }

    public function sat(): string
    {
        return self::SAT_STATE;
    }

    public function cit(): string
    {
        return self::CIT_STATE;
    }

    public function ananda(): string
    {
        return self::ANANDA_STATE;
    }
}
