<?php

declare(strict_types=1);

namespace SI;

final class Bhagavan extends Shaktiman
{
    private array $names = [];
    private array $paraShaktiNames = [];

    public function __construct(string|array $purushaNames = 'Śrī Kṛṣṇa', string|array $shaktiNames = 'Śrīmatī Rādhikā')
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
