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
        $this->assertEquals('Śrī Kṛṣṇa', $this->K->name());
        $this->assertEquals('Śrīmatī Rādhikā', $this->K->shaktiNames[0]);
        $this->assertEquals(Divinity::SAT_STATE, $this->K->sat());
        $this->assertEquals(Divinity::CIT_STATE, $this->K->cit());
        $this->assertEquals(Divinity::ANANDA_STATE, $this->K->ananda());
        $this->assertTrue(count(Krishna::getForms()) > 1);
        $this->assertTrue(count($this->K->shakti->jiva->getJivas()) == JIVAS_COUNT);
        
        
    }

    public function testNames(): void
    {
        $Rama = $this->K->revealForm('rama');
        $this->assertEquals('Śrī Rāma', $Rama->name());
        $this->assertEquals('Śrī Sīta', $Rama->shaktiNames[0]);
        $this->assertEquals('Śrī Kṛṣṇa Govinda Syama', implode(' ', $this->K->names));
        $ParaShaktis = implode(' ', $this->K->shaktiNames);
        $this->assertEquals('Śrīmatī Rādhikā Śrī Rādhā', $ParaShaktis);
        $this->assertEquals('Antaraṅga-śakti', $this->K->shakti->cit->getName());  
        $this->assertEquals('Taṭasthā-śakti', $this->K->shakti->jiva->getName());  
        $this->assertEquals('Bahiraṅga-śakti', $this->K->shakti->maya->getName());    
    }
}