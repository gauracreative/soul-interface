<?php

namespace GodAPI\Matter\Bodies;

interface Body
{
    public function getName(): string;

    public function abilityToThink(): ?string;

    public function abilityToSmell(): ?string;

    public function abilityToSee(): ?string;

    public function abilityToTouch(): ?string;

    public function abilityToTaste(): ?string;

    public function abilityToHear(): ?string;

    public function abilityToMoveAroundAndAct(): ?string;
}
