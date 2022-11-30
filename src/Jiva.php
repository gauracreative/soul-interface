<?php

declare(strict_types=1);

namespace SI;

use SI\Resources\Matter\Bodies\Body;
use SI\Resources\Spirit\Identities\SiddhaDeha;
use SI\Shakti\Bahiranga as BahirangaShakti;
use SI\Shakti\Tatastha as TatasthaShakti;
use SI\Resources\Spirit\Adhikar\bhaktiAdhikar;
use SI\Resources\Spirit\Adhikar\Prema;
use SI\Resources\Spirit\Adhikar\Sukriti;

use function PHPUnit\Framework\throwException;

final class Jiva extends Divinity
{
    public const BHAKTI_LEVELS = [
        'Sukriti',
        'Shraddha',
        'SadhuSanga',
        'BhajanaKriya',
        'AnarthaNivritti',
        'Nistha',
        'Ruchi',
        'Asakti',
        'Bhava',
        'Prema'
    ];

    private ?bhaktiAdhikar $bhaktiAdhikar = null;
    private SiddhaDeha $siddhaDeha;
    private ?Body $materialBody = null;
    private BahirangaShakti|false $covering;

    public function __construct(
        ?bool $mukta = null,
        ?SiddhaDeha $siddhaDeha = null
    ) {
        parent::__construct();
        $this->siddhaDeha = $siddhaDeha ?? TatasthaShakti::getRandomSiddhaDeha();
        $this->covering = BahirangaShakti::coverRandomly($mukta);
        $this->setBhaktiAdhikar();
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

    public function revealSidhaDeva(): SiddhaDeha
    {
        return $this->siddhaDeha;
    }

    public function body(): ?Body
    {
        return $this->materialBody ?? null;
    }

    public function incarnate(?Body $newBody = null)
    {
        if ($this->isMukta()) {
            $newBody = null;
        } elseif (!$newBody) {
            $newBody = BahirangaShakti::getRandomBody();
        }
        $this->materialBody = $newBody;
    }

    public function getBhaktiAdhikar(): bhaktiAdhikar
    {
        return $this->bhaktiAdhikar;
    }

    public function setBhaktiAdhikar(?bhaktiAdhikar $bhaktiAdhikar = null): void
    {
        // validate
        if (!is_null($bhaktiAdhikar) && !is_a($this->body(), 'SI\Resources\Matter\Bodies\Human')) {
            throw new \InvalidArgumentException('This Jīva is not in human body currently. Cannot set Adhikara');
        } elseif ($this->isMukta() && !is_null($bhaktiAdhikar) && !is_a($bhaktiAdhikar, 'SI\Resources\Spirit\Adhikar\Prema')) {
            throw new \InvalidArgumentException('For liberated soul Adhikara must be set to Prema');
        }
        // set
        if ($this->isMukta()) {
            $this->bhaktiAdhikar = new Prema();
        } elseif ($bhaktiAdhikar) {
            $this->bhaktiAdhikar = $bhaktiAdhikar;
            if (is_a($bhaktiAdhikar, 'SI\Resources\Spirit\Adhikar\Prema')) {
                $this->materialBody = null;
                $this->covering = false;
            }
        } else {
            $this->bhaktiAdhikar = new Sukriti();
        }
    }

    public function doBhakti(): void
    {
        if (!$this->isMukta()) {
            $segments = explode('\\', get_class($this->bhaktiAdhikar));
            $newLevel = array_search(end($segments), self::BHAKTI_LEVELS) + 1;
            $class = '\SI\Resources\Spirit\Adhikar\\'.self::BHAKTI_LEVELS[$newLevel];
            $this->setBhaktiAdhikar(new $class());
        }
    }
}
