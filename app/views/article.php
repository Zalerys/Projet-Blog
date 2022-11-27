<?php

use App\Entity\Comment;

$idUser = $_SESSION["User"]["userId"];
$nameUser = $_SESSION["User"]["username"];
/** @var App\Entity\Post $post */
foreach ($users as $user) {
    if ($post->getUserId() === $user->getUserId()) {
        echo "Je suis le créateur " . $postUser = $user->getUsername();
    }
}
?>
<a href="/home">home</a>
<h3>Créateur : <?= $postUser ?></h3>
<p> Créez : <?= $post->getCreationDate() ?></p>
<h4>Titre : <?= $post->getTitle() ?></h4>
<p>Contenu : <?= $post->getContent() ?></p>
<p>Id du poste : <?= $post->getPostId() ?></p>
<?php if (($_SESSION["User"]["userId"] === $post->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
    <form action="/home/delete" method="POST"><button>Delete</button>
        <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
        <input type="hidden" name="postUser" value="<?= $post->getUserId() ?>">
    </form>
    <form method="POST"><button>Modify</button>
        <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
        <label for="title">Titre : </label>
        <input type="text" name="title" value="<?= $post->getTitle() ?>" required>
        <label for="content">Contenu : </label>
        <input type="text" name="content" value="<?= $post->getContent() ?>" required>
    </form>

    <hr>
<?php endif ?>
<form action="comment" method="POST">
    <input type="hidden" name="userId" value="<?= $idUser ?>">
    <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?= $nameUser ?>" disabled>
    <label for="comment">Commentaire</label>
    <input type="text" name="comment" required>
    <button>envoyer</button>
</form>
<hr>
<?php
/** @var App\Entity\Comment[] $comments */
/** @var App\Entity\Child[] $childComments */
foreach ($comments as $comment) : ?>
    <?php if ($post->getPostId() === $comment->getPostId()) : ?>
        <h2>l'id du comment : <?= $comment->getCommentId() ?>, <?= $comment->getCreationDate() ?></h2>
        <h3>celui qui a comment : <?= $comment->getUsername() ?></h3>
        <h1>le comment : <?= $comment->getContent() ?></h1>
        <?php if (($_SESSION["User"]["userId"] === $comment->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
            <form action="/home/delete/comment" method="POST"><button>Delete</button>
                <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                <input type="hidden" name="commentId" value="<?= $comment->getCommentId() ?>">
                <input type="hidden" name="commentUser" value="<?= $comment->getUserId() ?>">
            </form>
        <?php endif ?>
        <form action="comment/child" method="POST">
            <label for="content">Comment</label>
            <input type="text" name="content" required>
            <input type="hidden" name="userId" value="<?= $idUser ?>">
            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
            <input type="hidden" name="username" value="<?= $nameUser ?>">
            <input type="hidden" name="commentId" value="<?= $comment->getCommentId() ?>">
            <button>envoyer</button>
        </form>
        <?php foreach ($childComments as $childComment) : ?>
            <?php if ($comment->getCommentId() === $childComment->getCommentId()) : ?>
                <div style="margin-left: 40px;">
                    <h3>id du comment : <?= $comment->getCommentId() ?></h3>
                    <h4> id du child : <?= $childComment->getChildId() ?></h4>
                    <p>contenu du child : <?= $childComment->getContent() ?></p>
                    <?php if (($_SESSION["User"]["userId"] === $childComment->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
                        <form action="/home/delete/comment/child" method="POST"><button>Delete</button>
                            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
                            <input type="hidden" name="childId" value="<?= $childComment->getChildId() ?>">
                        </form>
                    <?php endif ?>
                </div>
                <hr>

            <?php endif; ?>
        <?php endforeach; ?>
        <hr>
    <?php endif; ?>
<?php endforeach; ?>