<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Krishna;

final class KarmaTest extends TestCase
{
    private Krishna $K;

    protected function setUp(): void
    {
        $this->K = Krishna::Om();
    }

    public function testBasicKarma(): void
    {
        $karma = $this->K->shakti->jiva->getHuman()->karma;
        $this->assertEquals(KARMAPOINTS_START, $karma->fruits);
        $this->assertEquals(0, $karma->seeds);
    }

    public function testAge(): void
    {
        $humanBody = $this->K->shakti->jiva->getHuman()->body();
        $this->assertEquals(0, $humanBody->getAge());
        $humanBody->age();
        $this->assertEquals(1, $humanBody->getAge());
        $this->assertTrue($humanBody->age());
    }

    public function testPurushartha(): void
    {
        $karma = $this->K->shakti->jiva->getHuman()->karma;
        $this->assertNull($karma->getPurushartha());
        foreach(PURUSHARTHA as $label => $level){
            $karma->seeds = $level;
            $this->assertEquals($label, $karma->getPurushartha());
        }
    }
}