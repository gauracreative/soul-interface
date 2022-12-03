<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Bodies;

use SI\config;

final class Human implements Body
{
    private const NAME = 'Human';
    private const LIFESPAN = config::HUMAN_LIFESPAN;
    private int $lifespan;
    private int $age = 0;

    public function __construct(?int $lifespan = null)
    {
        $this->lifespan = $lifespan ?? static::LIFESPAN;
    }

    public function getName(): string
    {
        return static::NAME;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function age(): bool
    {
        if ($this->age == $this->lifespan) {
            return false;
        }
        $this->age++;
        return true;
    }

    public function abilityToThink(): ?string
    {
        return 'Yes, quite advantageous';
    }

    public function abilityToSmell(): ?string
    {
        return 'Yes, via nose';
    }

    public function abilityToSee(): ?string
    {
        return 'Yes, via 2 eyes';
    }

    public function abilityToTouch(): ?string
    {
        return 'Yes, via skin';
    }

    public function abilityToTaste(): ?string
    {
        return 'Yes, via tongue';
    }

    public function abilityToHear(): ?string
    {
        return 'Yes, via 2 ears';
    }

    public function abilityToMoveAroundAndAct(): ?string
    {
        return 'Yes, via 2 legs, 2 hands, etc.';
    }
}
