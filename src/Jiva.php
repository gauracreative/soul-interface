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
use SI\Resources\Matter\Modes\Mix as GunaMix;
use SI\Resources\Matter\Modes\Nirguna;
use SI\Resources\Matter\Karma\Karma;
use SI\config;

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
    public Karma $karma;
    private string $istaDev;

    public function __construct()
    {
        $this->istaDev = TatasthaShakti::setIstaDev();
        $this->siddhaDeha = TatasthaShakti::getRandomSiddhaDeha($this->istaDev);
        $this->covering = BahirangaShakti::coverRandomly();
        $this->setBhaktiAdhikar();
        $this->incarnate();
    }

    public function sat(): string
    {
        return $this->isMukta() ? Divinity::SAT_STATE : $this->covering->cloudSat(Divinity::SAT_STATE);
    }

    public function cit(): string
    {
        return $this->isMukta() ? Divinity::CIT_STATE : $this->covering->cloudCit(Divinity::CIT_STATE);
    }

    public function ananda(): string
    {
        return $this->isMukta() ? Divinity::ANANDA_STATE : $this->covering->cloudAnanda(Divinity::ANANDA_STATE);
    }

    public function isMukta(): bool
    {
        return $this->covering === false;
    }

    public function revealSiddhaDeha(): SiddhaDeha
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
            $this->karma = new Karma();
        }
        $this->materialBody = $newBody;
    }

    public function getBhaktiAdhikar(): bhaktiAdhikar
    {
        return $this->bhaktiAdhikar;
    }

    public function getIstaDev(): string
    {
        return $this->istaDev;
    }

    public function setBhaktiAdhikar(?bhaktiAdhikar $bhaktiAdhikar = null): void
    {
        $class = $this->body() ? get_class($this->body()) : '';
        // validate
        if (!is_null($bhaktiAdhikar) && !is_a($this->body(), 'SI\Resources\Matter\Bodies\Human')) {
            throw new \InvalidArgumentException('This Jīva is not in human body currently. Cannot set Adhikar');
        } elseif ($this->isMukta() && !is_null($bhaktiAdhikar) && !is_a($bhaktiAdhikar, 'SI\Resources\Spirit\Adhikar\Prema')) {
            throw new \InvalidArgumentException('For liberated soul Adhikar must be set to Prema');
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
            $newLevel = array_search(end($segments), static::BHAKTI_LEVELS) + 1;
            $class = '\SI\Resources\Spirit\Adhikar\\'.static::BHAKTI_LEVELS[$newLevel];
            $this->setBhaktiAdhikar(new $class());
        }
    }

    public function getLevel(): int
    {
        $segments = explode('\\', get_class($this->bhaktiAdhikar));
        return array_search(end($segments), static::BHAKTI_LEVELS);
    }

    // percentage, the less the lighter karma / coverage
    public function clarityGrade(): int
    {
        $bhaktiLevel = $this->getLevel();
        $bhaktiLevel = 10*(10-$bhaktiLevel);
        $karmaLevel = (config::KARMAPOINTS_TOP - $this->karma->seeds)/config::KARMAPOINTS_TOP;
        return intval($bhaktiLevel*$karmaLevel);
    }

    public function howIamFeeling(): GunaMix|Nirguna
    {
        if ($this->isMukta()) {
            return new Nirguna(0);
        } else {
            return BahirangaShakti::getGunaMix($this->clarityGrade());
        }
    }
}
