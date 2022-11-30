<?php declare(strict_types=1);

$KrishnaCode = '$Krishna = new SI\Bhagavan([\'Śrī Kṛṣṇa\', \'Govinda\', \'Syama\']);';
?>

<h1>Bhagavān (God)</h1>
<?php code([
    'use SI\Bhagavan;',
    '',
    '$Krishna = new Bhagavan([\'Śrī Kṛṣṇa\', \'Govinda\', \'Syama\']);',
    'echo $Krishna->getName();',
    '$names = $Krishna->getNames();',
    'echo implode(\' a.k.a. \', $names);'
]); ?>
<p>Notice that both <?php snipet('Bhagavan::class') ?> and <?php snipet('Jiva::class') ?> extend the abstract <?php snipet('Divinity::class') ?>, which has <?php snipet('sat()') ?>, <?php snipet('cit()') ?> and <?php snipet('ananda()') ?> methods. The 3 words stand for eternity (sat), knowledge (cit) and bliss (ananda) respectively. Those are some atomic, intrinsic natures or the "divine" common origin of both God and Jiva. As we say, we are created in God's image... The difference, as you will see more later, is that God's sat-cit-ananda stays in its original pure state forever, whereas Jiva's sat-cit-ananda can be clouded. Hens, <?php snipet('Jiva::class') ?> has those methods overriden.</p>
<?php code([
    'echo $Krishna->sat();',
    'echo $Krishna->cit();',
    'echo $Krishna->ananda();'
], [$KrishnaCode]); ?>
<p>Bhagavān has His shaktis (energies), foremost (complete) of each is para-shakti. Think of it as a consort, second half. Without Para-Shakti Bhagavān can only desire. His Shakti is who fullfills His desires.</p>
<?php code([
    '$KrishnaParaShaktiNames = $Krishna->shakti()->getNames();',
    'echo implode(\' a.k.a. \', $KrishnaParaShaktiNames);'
], [$KrishnaCode]); ?>
<p>You can also specify specific form of Bhagavān's Para-Shakti name as the second parameter in the construct.</p>
<?php code([
    'use SI\Bhagavan;',
    '',
    '$Rama = new Bhagavan(\'Śrī Rāma\', \'Śrī Sīta\');',
    'echo $Rama->getName();',
    '$RamaParaShaktiNames = $Rama->shakti()->getNames();',
    'echo implode(\' a.k.a. \', $RamaParaShaktiNames);'
], ['$Rama = new SI\Bhagavan(\'Śrī Rāma\', \'Śrī Sīta\');']); ?>
<p>Bhagavān is actually incomplete without His śaktis. Not that He can ever be without them. So, it is actually very symbolic that both names (or arrays of names go next to each other into the <?php snipet('Bhagavan::__construct()') ?> method. Well, of course there shouldn't be one to start with. &ndash; All various forms of Bhagavān exist eternally. You cannot exactly "create" a new one. Same goes for Jīvas (souls), by the way. "Us" are eternal as well. But, you know, this is just a tool. You can only go so far with this.. Hopefully this can help share some very basic idea.</p>
<p>Para shakti (complete energy) consists of 3 other śaktis:</p>
<?php code([
    '$citShakti = $Krishna->shakti()->cit();',
    'printf(\'%s - %s\', $citShakti->getName(), $citShakti->getDescription());',
    '$mayaShakti = $Krishna->shakti()->maya();',
    'printf(\'%s - %s\', $mayaShakti->getName(), $mayaShakti->getDescription());',
    '$jivaShakti = $Krishna->shakti()->jiva();',
    'printf(\'%s - %s\', $jivaShakti->getName(), $jivaShakti->getDescription());'
], [$KrishnaCode]); ?>
<p>More on those in their respective chapters - use top navigation.</p>