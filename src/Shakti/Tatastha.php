<?php

declare(strict_types=1);

namespace SI\Shakti;

use InvalidArgumentException;
use SI\Jiva;
use SI\Shakti\onDemandPowers\Siddha as SiddhaTrait;

final class Tatastha extends Shakti
{
    use SiddhaTrait;

    protected const NAMES = ['Taṭasthā-śakti', 'Jīva-śakti'];

    protected const DESCRIPTION = 'Marginal potency. Taṭasthā means shore-line. A tide might get it wet. Then it might become dry-ish again. Similar is a position of Jīva (soul). It can be with Bhagavān, enjoying an eternal loving relationship, or it can be under Māyā-śakti and forgetting Bhagavān.';

    private array $jivas = [];

    public function createJivas(?int $count = null): void
    {
        $count = $count ?? config('souli.jivas_count');

        for ($i = 1; $i <= $count; $i++) {
            $this->jivas[] = new Jiva();
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
        if (! $filters) {
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

        return $one;
    }

    public function getJivas(): array
    {
        return $this->jivas;
    }
}
