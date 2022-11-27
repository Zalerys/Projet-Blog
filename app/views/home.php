<h1><a href="/home">Bienvenue <?= $_SESSION["User"]["username"] ?></a></h1>
<a href="/login">Home</a>
<a href="/admin">Admin</a>
<form action="" method="POST">
    <label for="title">Titre</label>
    <input type="text" name="title" required>
    <label for="content">Créez un nouveau post</label>
    <textarea name="content" id="content" cols="30
    0" rows="3" required></textarea>
    <button>Envoyer</button>
</form>

<?php
/** @var App\Entity\Post[] $posts */
/** @var App\Entity\User[] $users */
foreach ($posts as $post) :
    foreach ($users as $user) {
        if ($user->getId() === $post->getUserId()) {
            $postUser = $user->getName();
        }
    };
?>
    <h3>Créateur : <?= $postUser ?></h3>
    <p> Créez : <?= $post->getCreationDate() ?></p>
    <h4>Titre : <?= $post->getTitle() ?></h4>
    <p>Contenu : <?= $post->getContent() ?></p>
    <p>id du poste : <?= $post->getPostId() ?></p>
    <?php if (($_SESSION["User"]["userId"] === $post->getUserId()) || $_SESSION["User"]["admin"] === 1) : ?>
        <form action="/home/delete" method="POST"><button>Delete</button>
            <input type="hidden" name="postId" value="<?= $post->getPostId() ?>">
            <input type="hidden" name="postUser" value="<?= $post->getUserId() ?>">
        </form>
    <?php endif ?>
    <form action="/home/post/<?= $post->getPostId() ?>" method="GET"><button>En savoir plus</button></form>
    <hr>
<?php endforeach ?>
