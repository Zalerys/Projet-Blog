<?php /** @var App\Entity\User $user */ ?>
<h1><?= $trucs; ?></h1>

<?php
/** @var App\Entity\ResponseToComment[] $posts */
foreach ($posts as $post) {
    echo $post->getContent();
}


