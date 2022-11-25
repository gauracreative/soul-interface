<?php

namespace GodAPI;

use GodAPI\Matter\Bodies\Body;
use GodAPI\Shakti\Bahiranga as BahirangaShakti;

final class Jiva extends Divinity
{
    private string $sidhaDeha;
    private ?Body $materialBody = null;
    private BahirangaShakti|false $covering;

    public function __construct(?bool $mukta = null, ?string $sidhaDeha = null)
    {
        $this->sidhaDeha = $sidhaDeha ?? uniqid('jiva_');
        $covering = \is_bool($mukta) ? !$mukta : mt_rand(0, 1);
        $this->covering = $covering ? new BahirangaShakti() : false;
        $this->incarnate();
    }

    public function sat()
    {
        return $this->isMukta() ? Divinity::SAT_STATE : $this->covering->cloudSat(Divinity::SAT_STATE);
    }

    public function cit()
    {
        return $this->isMukta() ? Divinity::CIT_STATE : $this->covering->cloudCit(Divinity::CIT_STATE);
    }

    public function ananda()
    {
        return $this->isMukta() ? Divinity::ANANDA_STATE : $this->covering->cloudAnanda(Divinity::ANANDA_STATE);
    }

    public function isMukta(): bool
    {
        return $this->covering === false;
    }

    public function receivedMukti(): void
    {
        if ($this->isMukta()) {
            throw new \Exception('The jiva is already liberated');
        }
        $this->materialBody = null;
        $this->covering = false;
    }

    public function revealSidhaDeva(): string
    {
        return $this->sidhaDeha;
    }

    public function body(): ?string
    {
        return $this->materialBody ? $this->materialBody->getName() : null;
    }

    public function incarnate(?string $newBody = null)
    {
        if ($this->isMukta()) {
            $newBody = null;
        } elseif (!$newBody) {
            // in real life there are about 8,400,000 only types of bodies...
            $availableBodies = array_filter(
                glob(__DIR__ . '/Matter/Bodies/*.php'),
                function ($path) {
                    $path_parts = pathinfo($path);

                    return $path_parts['basename'] != 'Body';
                }
            );
            $availableBodies = array_map(function ($path) {
                $path_parts = pathinfo($path);

                return $path_parts['filename'];
            }, glob(__DIR__ . '/Matter/Bodies/*.php'));
            $availableBodies = array_filter(
                $availableBodies,
                function ($class) {
                    return $class != 'Body';
                }
            );
            $availableBodies = array_values($availableBodies);
            // var_dump($availableBodies);
            $randomIndex = \count($availableBodies) > 1 ? mt_rand(0, \count($availableBodies) - 1) : 0;
            $bodyClass = 'GodAPI\Matter\Bodies\\' . $availableBodies[$randomIndex];
            $newBody = new $bodyClass();
        }

        $this->materialBody = $newBody;
    }

    public function canLovinglyServeGod()
    {
        return $this->isMukta() ? Divinity::ANANDA_STATE : $this->covering->cloudAnanda(Divinity::ANANDA_STATE);
    }
}
