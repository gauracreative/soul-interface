<?php

declare(strict_types=1);

namespace SI\Resources\Matter\Bodies;

final class Cow implements Body
{
    private const NAME = 'Cow';

    public function getName(): string
    {
        return self::NAME;
    }

    public function abilityToThink(): ?string
    {
        return 'Not a very significant one';
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
        return 'Yes, via 4 legs, etc.';
    }
}
