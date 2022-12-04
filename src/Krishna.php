<?php

declare(strict_types=1);

namespace SI;

final class Krishna extends Bhagavan
{
    private const FORMS = [
        'rama' => [
            'purusha' => 'Śrī Rāma',
            'shakti' => 'Śrī Sīta',
        ],
        'narayan' => [
            'purusha' => ['Śrī Nārāyaṇa', 'Śrī Viṣṇu'],
            'shakti' => 'Śrī Lakṣmī',
        ],
        'nrsmha' => [
            'purusha' => 'Śrī Narasiṃha',
            'shakti' => 'Śrī Lakṣmī',
        ],
    ];

    private array $forms = [];

    public function __construct()
    {
        parent::__construct(['Śrī Kṛṣṇa', 'Govinda', 'Syama'], ['Śrīmatī Rādhikā', 'Śrī Rādhā']);
    }

    public static function Om(): self
    {
        $Krishna = new self();
        foreach (static::FORMS as $key => $names) {
            $Krishna->forms[$key] = new Bhagavan($names['purusha'], $names['shakti']);
        }
        $Krishna->shakti->jiva->createJivas();

        return $Krishna;
    }

    public static function getForms(?bool $includeKrishna = false): array
    {
        $forms = array_keys(static::FORMS);
        if ($includeKrishna) {
            $forms[] = 'krsna';
        }

        return $forms;
    }

    public function revealForm(string $key): Bhagavan
    {
        return $this->forms[$key];
    }
}
