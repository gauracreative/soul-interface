<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Bhagavan;
use SI\Divinity;
use SI\Shakti\Bahiranga;
use SI\Resources\Spirit\Identities\SiddhaDeha;
use SI\Resources\Matter\Bodies\Body;

final class BhagavanTest extends TestCase
{
    public function testBasic(): void
    {
        $Krishna = new Bhagavan();
        $this->assertEquals('Śrī Kṛṣṇa', $Krishna->getName());
        $ParaShaktis = $Krishna->shakti()->getNames();
        $this->assertEquals('Śrīmatī Rādhikā', end($ParaShaktis));
        $this->assertEquals(Divinity::SAT_STATE, $Krishna->sat());
        $this->assertEquals(Divinity::CIT_STATE, $Krishna->cit());
        $this->assertEquals(Divinity::ANANDA_STATE, $Krishna->ananda());
        
    }

    public function testNames(): void
    {
        $Rama = new Bhagavan('Śrī Rāma', 'Śrī Sīta');
        $this->assertEquals('Śrī Rāma', $Rama->getName());
        $ParaShaktis = $Rama->shakti()->getNames();
        $this->assertEquals('Śrī Sīta', end($ParaShaktis));
        $Krishna = new Bhagavan(['Śrī Kṛṣṇa', 'Govinda', 'Syama'], ['Śrīmatī Rādhikā', 'Śrī Rādhā']);
        $this->assertEquals('Śrī Kṛṣṇa Govinda Syama', implode(' ', $Krishna->getNames()));
        $ParaShaktis = implode(' ', $Krishna->shakti()->getNames());
        $this->assertEquals('Svarūpa-śakti Pārā-śakti Śrīmatī Rādhikā Śrī Rādhā', $ParaShaktis);      
    }
}