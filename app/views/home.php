<h1><a href="/home">Bienvenue <?= $_SESSION["User"]["username"] ?></a></h1>
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
/** @var App\Entity\ResponseToComment[] $posts */
foreach ($posts as $post) {
    echo $post->getContent();
}


