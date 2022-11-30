<?php declare(strict_types=1); ?>

<h1>Māyā (the matter)</h1>
<p>Please review <a href="/bhagavan" title="Bhagavān">Bhagavān</a> and <a href="/jiva" title="Jīva">Jīva</a> sections first, if you have not. This is based on those topics.</p>
<p>Bahiraṅga-śakti a.k.a. Māyā-śakti a.k.a. Pradhāna is one of the 3 principle energies of Bhagavān. It is His external energy, matter, material energy. That is the one that keeps Jīva (living entity) in illusion in respect to the true knowledge of themselves, Bhagavān and other tattvas (truths).</p>
<?php code([
    'use SI\Bhagavan;',
    '',
    '$God = new Bhagavan();',
    '$pradhana = $God->shakti()->maya();',
    'echo $pradhana->getName();',
    '$names = $pradhana->getNames();',
    'echo implode(\' a.k.a. \', $names);',
    'echo $pradhana->getDescription();'
]); ?>
<p>The "purpose" of Māyā-śakti has been explained in <a href="/jiva" title="Jīva">Jīva</a> section. That is to make it possible for the Jīva to excercise free will, and thus sort of validate the love between Bhagavān and Jīva. If you have to love, that is not love...</p>
<p>This philosophical point is a very important to understand. Let's look at it one more time. Let's take a liberated Jīva in original pure consciousness.</p>
<?php code([
    'use SI\Jiva;',
    '',
    '$jiva = new Jiva(true);',
    '',
    'echo $jiva->sat();',
    'echo $jiva->cit();',
    'echo $jiva->ananda();'
]); ?>
<p><?php snipet('Bahiranga::class') ?> extends abstract <?php snipet('Shakti\onDemandPowers\Incarnate::class') ?> and implements <?php snipet('Shakti\Shakti::interface') ?></p>