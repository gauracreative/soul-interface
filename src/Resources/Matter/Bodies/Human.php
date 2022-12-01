<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Bodies;

final class Human implements Body
{
    private const NAME = 'Human';

    public function getName(): string
    {
        return static::NAME;
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
