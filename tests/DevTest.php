<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Krishna;
use SI\Jiva;
use SI\config;

final class DevTest extends TestCase
{
    private Krishna $K;

    protected function setUp(): void
    {
        $this->K = Krishna::Om();
    }

    public function testDev(): void
    {
        $human = $this->K->shakti->jiva->getHuman();
        $this->assertEquals(0, $human->getLevel());
        foreach(Jiva::BHAKTI_LEVELS as $i => $class){
            $class = 'SI\Resources\Spirit\Adhikar\\'.$class;
            $newAdhikar = new $class();
            $human->setBhaktiAdhikar($newAdhikar);
            $this->assertEquals($i, $human->getLevel());
        }
    }
}