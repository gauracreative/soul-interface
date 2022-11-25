<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use GodAPI\Jiva;
use GodAPI\Divinity;
use GodAPI\Shakti\Bahiranga;

final class JivaTest extends TestCase
{
    public function testBasicMuktaJivaFunctions(): void
    {
        $jiva = new Jiva(true);
        $this->assertTrue($jiva->isMukta());
        $this->assertEquals(Divinity::SAT_STATE, $jiva->sat());
        $this->assertEquals(Divinity::CIT_STATE, $jiva->cit());
        $this->assertEquals(Divinity::ANANDA_STATE, $jiva->ananda());
        $this->assertStringContainsString('jiva_', $jiva->revealSidhaDeva());
        $this->assertNull($jiva->body());
        $this->expectException(Exception::class);
        $jiva->receivedMukti();
    }

    public function testBasicBaddhaJivaFunctions(): void
    {
        $jiva = new Jiva(false);
        $this->assertFalse($jiva->isMukta());
        $this->assertStringContainsString(Bahiranga::CONDITIONED_PHRASE, $jiva->sat());
        $this->assertStringContainsString(Bahiranga::CONDITIONED_PHRASE, $jiva->cit());
        $this->assertStringContainsString(Bahiranga::CONDITIONED_PHRASE, $jiva->ananda());
        $this->assertStringContainsString('jiva_', $jiva->revealSidhaDeva());
        // $this->assertStringContainsString('body_', $jiva->body());
        $jiva->receivedMukti();
        $this->assertTrue($jiva->isMukta());
        $this->assertNull($jiva->body());
    }
}