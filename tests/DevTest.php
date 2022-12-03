<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Krishna;
use SI\config;

final class DevTest extends TestCase
{
    private Krishna $K;

    protected function setUp(): void
    {
        $this->K = Krishna::Om();
    }

    public function testPurushartha(): void
    {
        $karma = $this->K->shakti->jiva->getHuman()->karma;
        $this->assertEquals(config::KARMAPOINTS_START, $karma->fruits);
        $this->assertEquals(0, $karma->seeds);
        $this->assertNull($karma->getPurushartha());
        foreach(config::PURUSHARTHA as $label => $level){
            $karma->seeds = $level;
            $this->assertEquals($label, $karma->getPurushartha());
        }
    }
}