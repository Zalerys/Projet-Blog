<h1><a href="/home">Bienvenue <?= $_SESSION["User"]["name"] ?></a></h1>
<a href="/login">Login</a>
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
<?php endforeach ?>
