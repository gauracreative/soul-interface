<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Krishna;
use SI\Divinity;

final class BhagavanTest extends TestCase
{
    private Krishna $K;

    protected function setUp(): void
    {
        $this->K = Krishna::Om();
    }

    public function testBasic(): void
    {
        $this->assertEquals('Śrī Kṛṣṇa', $this->K->getName());
        $ParaShaktis = $this->K->shakti->getNames();
        $this->assertEquals('Śrī Rādhā', end($ParaShaktis));
        $this->assertEquals(Divinity::SAT_STATE, $this->K->sat());
        $this->assertEquals(Divinity::CIT_STATE, $this->K->cit());
        $this->assertEquals(Divinity::ANANDA_STATE, $this->K->ananda());
        $this->assertTrue(count($this->K->revealForms()) > 1);
        $this->assertTrue(count($this->K->shakti->jiva->getJivas()) == JIVAS_COUNT);
        
        
    }

    public function testNames(): void
    {
        $Rama = $this->K->revealForm('rama');
        $this->assertEquals('Śrī Rāma', $Rama->getName());
        $ParaShaktis = $Rama->shakti->getNames();
        $this->assertEquals('Śrī Sīta', end($ParaShaktis));
        $this->assertEquals('Śrī Kṛṣṇa Govinda Syama', implode(' ', $this->K->getNames()));
        $ParaShaktis = implode(' ', $this->K->shakti->getNames());
        $this->assertEquals('Svarūpa-śakti Pārā-śakti Śrīmatī Rādhikā Śrī Rādhā', $ParaShaktis);      
    }
}