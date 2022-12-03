<?php

declare(strict_types=1);

namespace SI\Shakti;

use InvalidArgumentException;
use SI\Shakti\onDemandPowers\Siddha as SiddhaTrait;
use SI\Jiva;
use SI\config;

class Tatastha implements Shakti
{
    use SiddhaTrait;

    private const NAMES = ['Taṭasthā-śakti', 'Jīva-śakti'];
    private const DESCRIPTION = 'marginal potency';

    private array $jivas = [];

    public function getName(): string
    {
        return static::NAMES[0];
    }

    public function getNames(): array
    {
        return static::NAMES;
    }

    public function getDescription(): string
    {
        return static::DESCRIPTION;
    }

    public function createJivas(?int $count = null): void
    {
        $count = $count ?? config::JIVAS_COUNT;

        for ($i = 1; $i <= $count; $i++) {
            $this->jivas[] = new Jiva();
            // var_dump($this->jivas);
        }
    }

    public function addJiva(Jiva $jiva): void
    {
        $this->jivas[] = $jiva;
    }

    public function getMukta(): ?Jiva
    {
        return $this->getOne(['mukta' => true]);
    }

    public function getBaddha(): ?Jiva
    {
        return $this->getOne(['mukta' => false]);
    }

    public function getHuman(): ?Jiva
    {
        return $this->getOne(['mukta' => false, 'body' => 'Human']);
    }

    public function getOne(?array $filters = null): ?Jiva
    {
        $one = null;
        shuffle($this->jivas);
        if (!$filters) {
            return $this->jivas[0];
        }
        foreach ($this->jivas as $jiva) {
            $found = true;
            foreach ($filters as $key => $val) {
                switch ($key) {
                    case 'mukta':
                        if ($val !== $jiva->isMukta()) {
                            $found = false;
                            break 2;
                        }
                        break;
                    case 'body':
                        if ($jiva->body()->getName() !== $val) {
                            $found = false;
                            break 2;
                        }
                        break;
                    default:
                        throw new InvalidArgumentException('incorrect filter used');
                }
            }
            if ($found) {
                $one = $jiva;
                break;
            }
        }
        unset($jiva);
        return $one;
    }

    public function getJivas(): array
    {
        return $this->jivas;
    }
}
