<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SI\Jiva;
use SI\Divinity;
use SI\Shakti\Bahiranga;
use SI\Resources\Spirit\Identities\SiddhaDeha;
use SI\Resources\Matter\Bodies\Body;
use SI\Resources\Matter\Bodies\Human;
use SI\Resources\Spirit\Adhikar\Prema;
use SI\Resources\Spirit\Adhikar\Sukriti;
use SI\Resources\Spirit\Adhikar\Shraddha;
use SI\Resources\Matter\Modes\Nirguna;
use SI\Resources\Matter\Modes\Sattva;
use SI\Resources\Matter\Modes\Rajas;
use SI\Resources\Matter\Modes\Tamas;
use SI\Resources\Matter\Modes\Mix;

final class JivaTest extends TestCase
{
    public function testMukta(): void
    {
        $jiva = new Jiva(true);
        $this->assertTrue($jiva->isMukta());
        $this->assertEquals(Divinity::SAT_STATE, $jiva->sat());
        $this->assertEquals(Divinity::CIT_STATE, $jiva->cit());
        $this->assertEquals(Divinity::ANANDA_STATE, $jiva->ananda());
        $this->assertInstanceOf(SiddhaDeha::class, $jiva->revealSiddhaDeha());
        $this->assertInstanceOf(Prema::class, $jiva->getBhaktiAdhikar());
        $this->assertNull($jiva->body());
    }

    public function testBaddha(): void
    {
        $jiva = new Jiva(false);
        $this->assertFalse($jiva->isMukta());
        $this->assertStringContainsString(Bahiranga::CONDITIONED_PHRASE, $jiva->sat());
        $this->assertStringContainsString(Bahiranga::CONDITIONED_PHRASE, $jiva->cit());
        $this->assertStringContainsString(Bahiranga::CONDITIONED_PHRASE, $jiva->ananda());
        $this->assertInstanceOf(SiddhaDeha::class, $jiva->revealSiddhaDeha());
        $this->assertInstanceOf(Sukriti::class, $jiva->getBhaktiAdhikar());
        $this->assertInstanceOf(Body::class, $jiva->body());
        $this->expectException(InvalidArgumentException::class);
        $jiva->setBhaktiAdhikar(new Prema);
        $jiva->incarnate(new Human);
        $jiva->setBhaktiAdhikar(new Prema);
        $this->assertTrue($jiva->isMukta());
        $this->assertNull($jiva->body());
    }

    public function testBhaktiAdhikar(): void
    {
        $jiva = new Jiva(false);
        $jiva->incarnate(new Human);
        $jiva->setBhaktiAdhikar(new Shraddha);
        $this->assertInstanceOf(Shraddha::class, $jiva->getBhaktiAdhikar());
        $jiva->setBhaktiAdhikar(new Sukriti);
        $jiva->doBhakti();
        $this->assertInstanceOf(Shraddha::class, $jiva->getBhaktiAdhikar());
        for ($i = 0; $i < 8; $i++){
            $jiva->doBhakti();
        }
        $this->assertInstanceOf(Prema::class, $jiva->getBhaktiAdhikar());
        $this->assertTrue($jiva->isMukta());
        $this->assertNull($jiva->body());
    }

    public function testJivaState(): void
    {
        $jiva = new Jiva(false);
        $jiva->incarnate(new Human);
        $jiva->setBhaktiAdhikar(new Shraddha);
        $level = $jiva->getCoverage();
        $this->assertEquals('90', $level);
        $max = $_ENV['GUNA_LEVEL_MAX'];
        $level = $level*$max/100;
        $state = $jiva->howIamFeeling();
        $this->assertInstanceOf(Mix::class, $state);
        $this->assertInstanceOf(Sattva::class, $state->sattva);
        $this->assertInstanceOf(Rajas::class, $state->rajas);
        $this->assertInstanceOf(Tamas::class, $state->tamas);
        $this->assertLessThanOrEqual($max, $state->sattva->getLevel());
        $this->assertLessThanOrEqual($level, $state->rajas->getLevel());
        $this->assertLessThanOrEqual($level, $state->tamas->getLevel());
        $jiva->setBhaktiAdhikar(new Prema);
        $state = $jiva->howIamFeeling();
        $this->assertInstanceOf(Nirguna::class, $state);
        $this->assertEquals($max, $state->getLevel());
    }
}