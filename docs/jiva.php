<?php declare(strict_types=1);
const BHAKTI_LEVEL_SHOW = 'printf(\'%s - %s\', $jiva->getBhaktiAdhikar()->getName(), $jiva->getBhaktiAdhikar()->getDescription());';
?>

<h1>Jīva (the soul)</h1>
<p>Jīva means "living entity". It also means the soul (ātma), since the soul is the actual living entity ("us"), and the material body is just a temporary covering, a dress of a kind that the soul puts on.</p>
<p>Jīva shares a number of divine qualities that God has. That is why both <?php snipet('Bhagavan::class') ?> and <?php snipet('Jiva::class') ?> extend the same abstract <?php snipet('Divinity::class') ?>, which has <?php snipet('sat()') ?>, <?php snipet('cit()') ?> and <?php snipet('ananda()') ?> public methods. The 3 words stand for eternity (sat), knowledge (cit) and bliss (ananda) respectively. Those are some atomic, intrinsic natures or the "divine" common origin in both God and Jīva. As we say, we are created in God's image...</p>
<?php code([
    'use SI\Bhagavan;',
    'use SI\Jiva;',
    '',
    '$God = new Bhagavan();',
    'echo $God->sat();',
    'echo $God->cit();',
    'echo $God->ananda();',
    '',
    '$jiva = new Jiva(true);',
    'echo $jiva->sat();',
    'echo $jiva->cit();',
    'echo $jiva->ananda();'
]); ?>
<p>Notice that when <?php snipet('$jiva') ?> is instantiated we used the boolean "True" as a parameter there <?php snipet('new Jiva(true)') ?>. This is to mock that the jiva created is "liberated" as in "not covered/effected" by illusion, which otherwise would effect those sat-cit-ananda qualities. Let's try another way now..</p>
<?php code([
    'use SI\Jiva;',
    '',
    '$jiva = new Jiva(false);',
    '',
    'echo $jiva->sat();',
    'echo $jiva->cit();',
    'echo $jiva->ananda();'
]); ?>
<p>Notice a difference? This Jīva is conditioned at the moment <?php snipet('$jiva = new Jiva(false);'); ?>, and the original "happy" outcomes of the sat-cit-ananda methods of <?php snipet('Divinity::class') ?> now first have to pass through filters of <?php snipet('Shakti\Bahiranga::class') ?>, and the final outcome isn't as "happy" as before.</p>
<p>Let's look at what is happening here. Jiva is created as "little God" (you can say, children of God). Parents and grant parents usually love to spend time with kids. It's fun. It's an exchange of love.. Similarly God expands Himself into unlimited number of "little Gods", so He can have fun in yet another one of unlimited ways He enjoys. That "ananda" part... we also have that. Whatever we do, it's for success and happiness of ourselves and the people we love, because the nature of love is such that making the loved ones happy also brings happiness to ourselves.</p>
<p>You may ask, where is the room for any kind of illusion or effected consciousness here? Why is there <?php snipet('$jiva = new Jiva(true); // liberated soul'); ?> and <?php snipet('$jiva = new Jiva(false); // conditioned soul'); ?>?</p>
<p>Good question. Let's continue with that parent-kids anology. It's fun to spend time with kids, but they aren't always willing to be with granpa, are they? They are persons? As such they have their own thinking and willing. Similarly, God has created us as little Himself (little spiritual persons). We have our independence. Otherwise, one may as well play with robots or something. If you have to love another, what kind of love would that be?..</p>
<p>So, independence means there has to be an environment one would be able to excercise it in. Now God, Bhagavān by definition is the best at everything. So, where would there be a possibility to not love Him? Remember, we are talking transcendental love here. It's far beyond "men", "women" and any other such distinctions, based on a temporary material body (covering). It's impossible to not choose to love God in clear consciousness, and yet there has to be a room to excercise the freedom. Else we cannot really talk about love. As love means "choice", "freedom". Getting it where I am trying to go with this? The material world is created to provide such an environment where due to the lack of the original clear way of perceiving things, God becomes optional. God becomes a matter of believe (for most). Yet, there is also a why to choose faith in the first place, then develop it all way to where it becomes a reality. Even on the material plane, many of us know to various degree, based on personal experience, that strong faith, conviction, vision materializes.</p>
<p>Anyway, I am far from even trying or convince anyone in anything. Especially this stuff here is beyond logic, beyond reasoning anyway. Just wanted to through in something, that I don't yet now how to express through OOP, or it would take too long to do that. :)</p>
<p>The main take away here is that even Jīvas that are currently conditioned, retain full capability to restore their original state. The covering is temporary. The nature of the water is liquidity. However if you put it in freezer it will freeze and become solid. Yet, everyone knows that this is a temporarily aquired quality. If you put the ice back out. It will melt and become liquid again. Same with with Jīva. Through the process of Bhakti a conditioned Jīva can become liberated again. Here is how that happens.</p>
<?php code([
    'use SI\Jiva;',
    'use SI\Resources\Matter\Bodies\Human;',
    '',
    '$jiva = new Jiva(false);',
    '// let\'s make sure this is a human, as only human can really do full Bhakti practice.',
    '$jiva->incarnate(new Human);',
    'echo $jiva->body()->getName();',
    'echo $jiva->isMukta() ? \'Liberated\' : \'Conditioned\';',
    BHAKTI_LEVEL_SHOW,
    '// Sukriti essentially means no level of Bhakti yet',
    '// Now let\'s have the Jīva progress through sequencial levels of Bhakti.',
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    '$jiva->doBhakti();',
    BHAKTI_LEVEL_SHOW,
    'echo $jiva->isMukta() ? \'Liberated\' : \'Conditioned\';',
    '// Now you can see that once the Jīva has reached the state of Prema Bhakti, the Jīva becomes liberated.',
    '',
    '// Technically there are several definitions or views on liberation, but to keep things simple, Prema Bhakti means "complete liberation".',
    '',
    'echo $jiva->body() ? $jiva->body()->getName() : \'No material body\';',
    'echo $jiva->revealSidhaDeva() ? $jiva->revealSidhaDeva()->getName() : \'No transcendental form\';',
    'echo $jiva->sat();',
    'echo $jiva->cit();',
    'echo $jiva->ananda();'
]); ?>
<p>There is a lot more to what exactly happens to the conditioned Jīva within the material world. After all this is each of us have right now... How do we improve? How do we become happier? More on that in <a href="/maya">Māyā (the matter)</a> section.</p>