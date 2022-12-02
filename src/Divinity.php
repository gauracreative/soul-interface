<?php

declare(strict_types=1);

namespace SI;

abstract class Divinity
{
    public const SAT_STATE = 'I am eternal';
    public const CIT_STATE = 'I am full of knowledge';
    public const ANANDA_STATE = 'I am full of bliss';

    public function __construct()
    {
        if (!defined('GUNA_LEVEL_MAX')) {
            define('GUNA_LEVEL_MAX', 255);
        }
        if (!defined('ROOT_PATH')) {
            define('ROOT_PATH', dirname(__DIR__));
        }
    }

    public function sat(): string
    {
        return static::SAT_STATE;
    }

    public function cit(): string
    {
        return static::CIT_STATE;
    }

    public function ananda(): string
    {
        return static::ANANDA_STATE;
    }
}
