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
        $this->assertEquals('Śrī Kṛṣṇa', $this->K->getName());
        $this->assertTrue(!empty($this->K->revealForms()));
        $this->assertIsArray($this->K->revealForms());
        $this->assertEquals('Śrī Rāma', $this->K->revealForms()['rama']->getName());
        $this->assertEquals('Taṭasthā-śakti', $this->K->shakti->jiva->getName());
        $this->assertIsArray($this->K->shakti->jiva->getJivas());
        $this->assertTrue(count($this->K->shakti->jiva->getJivas()) == JIVAS_COUNT);
        $human = $this->K->shakti->jiva->getHuman();
        $this->assertEquals('Human', $human->body()->getName());
        $this->assertFalse($human->isMukta());
    }
}