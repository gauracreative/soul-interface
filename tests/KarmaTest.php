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
        $human = $this->K->shakti->jiva->getHuman();
        $this->assertEquals(PRARABDHA_STARTER, $human->karma->fruits);
        $this->assertEquals(0, $human->karma->seeds);
    }
}