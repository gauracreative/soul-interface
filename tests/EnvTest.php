<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Jiva;

final class EnvTest extends TestCase
{
    public function testEnv(): void
    {
        $jiva = new Jiva();
        $this->assertTrue(defined('GUNA_LEVEL_MAX'));
        $this->assertTrue(is_int(GUNA_LEVEL_MAX));
        $this->assertEquals(255, GUNA_LEVEL_MAX);
    }
}