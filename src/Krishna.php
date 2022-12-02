<?php

declare(strict_types=1);

namespace SI;

final class Krishna extends Bhagavan
{
    private array $forms = [];

    public function __construct()
    {
        parent::__construct(['Śrī Kṛṣṇa', 'Govinda', 'Syama'], ['Śrīmatī Rādhikā', 'Śrī Rādhā']);
    }

    public static function Om(): self
    {
        $Krishna = new self();
        $Krishna->forms['rama'] = new Bhagavan('Śrī Rāma', 'Śrī Sīta');
        $Krishna->forms['visnu'] = new Bhagavan('Śrī Viṣṇu', 'Śrī Lakṣmī');
        $Krishna->forms['narayan'] = new Bhagavan('Śrī Nārāyaṇa', 'Śrī Lakṣmī');
        $Krishna->forms['nrsmha'] = new Bhagavan('Śrī Narasiṃha', 'Śrī Lakṣmī');
        $Krishna->shakti->jiva->createJivas();

        return $Krishna;
    }

    public function revealForms(): array
    {
        return $this->forms;
    }

    public function revealForm(string $key): Bhagavan
    {
        return $this->forms[$key];
    }
}
