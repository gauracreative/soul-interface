<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Krishna;

final class DevTest extends TestCase
{
    private Krishna $K;

    protected function setUp(): void
    {
        $this->K = Krishna::Om();
    }

    public function testDev(): void
    {
        $this->assertEquals('Śrī Kṛṣṇa', $this->K->name());
        $this->assertFalse(empty(Krishna::getForms()));
        $this->assertIsArray(Krishna::getForms());
        $this->assertEquals('Śrī Rāma', $this->K->revealForm('rama')->name());
        $this->assertEquals('Taṭasthā-śakti', $this->K->shakti->jiva->getName());
        $this->assertIsArray($this->K->shakti->jiva->getJivas());
        $this->assertTrue(count($this->K->shakti->jiva->getJivas()) == JIVAS_COUNT);
        $human = $this->K->shakti->jiva->getHuman();
        $this->assertEquals('Human', $human->body()->getName());
        $this->assertFalse($human->isMukta());
        $this->assertTrue(in_array($human->getIstaDev(), Krishna::getForms(true)));
        $this->assertEquals(PRARABDHA_STARTER, $human->karma->fruits);
        $this->assertEquals(0, $human->karma->seeds);
    }
}