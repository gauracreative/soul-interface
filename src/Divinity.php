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
    }

    public function sat()
    {
        return self::SAT_STATE;
    }

    public function cit()
    {
        return self::CIT_STATE;
    }

    public function ananda()
    {
        return self::ANANDA_STATE;
    }

    final public function me()
    {
        $this->sat();
        $this->cit();
        $this->ananda();
    }
}
