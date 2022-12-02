<?php

declare(strict_types=1);

namespace SI;

class Bhagavan extends Shaktiman
{
    protected array $names = [];
    protected array $paraShaktiNames = [];

    public function __construct(string|array $purushaNames, string|array $shaktiNames)
    {
        $this->names = (array) $purushaNames;
        $this->paraShaktiNames = (array) $shaktiNames;
        parent::__construct($this->paraShaktiNames);
    }

    public function getName(): string
    {
        return $this->names[0];
    }

    public function getNames(): array
    {
        return $this->names;
    }
}
