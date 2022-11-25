<?php

namespace GodAPI\Shakti;

interface Shakti
{
    public function getName(): string;

    public function getDescription(): string;

    public function cloudSat(string $originalSat): string;

    public function cloudCit(string $originalChit): string;

    public function cloudAnanda(string $originalAnanda): string;
}
