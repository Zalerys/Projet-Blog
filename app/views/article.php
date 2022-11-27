<?php

$idUser = $_SESSION["User"]["userId"];
$nameUser = $_SESSION["User"]["username"];
/** @var App\Entity\Post $post */
foreach ($users as $user) {
    if ($post->getAuthorId() === $user->getAuthorId()) {
        echo "Bonjour " . $postUser = $user->getName();
    }
}
?>
<a href="/home">home</a>
<h3>Créateur : <?= $postUser ?></h3>
<p> Créez : <?= $post->getDateTime() ?></p>
<h4>Titre : <?= $post->getTitle() ?></h4>
<p>Contenu : <?= $post->getContent() ?></p>
<p>Id du poste : <?= $post->getId() ?></p>
<?php if (($_SESSION["User"]["userId"] === $post->getAuthorId()) || $_SESSION["User"]["admin"] === 1) : ?>
    <form action="/home/delete" method="POST"><button>Delete</button>
        <input type="hidden" name="postId" value="<?= $post->getId() ?>">
        <input type="hidden" name="postUser" value="<?= $post->getAuthorId() ?>">
    </form>
    <form method="POST"><button>Modify</button>
        <input type="hidden" name="postId" value="<?= $post->getId() ?>">
        <label for="title">Titre : </label>
        <input type="text" name="title" value="<?= $post->getTitle() ?>" required>
        <label for="content">Contenu : </label>
        <input type="text" name="content" value="<?= $post->getContent() ?>" required>
    </form>

    <hr>
<?php endif ?>
<form action="comment" method="POST">
    <input type="hidden" name="userId" value="<?= $idUser ?>">
    <input type="hidden" name="postId" value="<?= $post->getId() ?>">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?= $nameUser ?>" disabled>
    <label for="comment">Commentaire</label>
    <input type="text" name="comment" required>
    <button>envoyer</button>
</form>
<hr>
