<table class="user-table">
    <tr>
        <td>Username</td>
        <td>Email</td>
        <td>Is Admin</td>
        <td>Action</td>
    </tr>
    <?php
    /** @var App\Entity\User[] $users */

    foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->getName() ?></td>
            <td><?= $user->getEmail() ?></td>
            <form method="post">
                <td>
                    <input type="hidden" name="admin" value="<?= $user->getRoleId() ?>">
                    <input type="hidden" name="checkboxValue" value='0'>
                    <input type="checkbox" name="checkboxValue" value='1' disabled <?= $user->getRoleId() == 1 ? "checked" : "" ?>>
                </td>
                <td>
                    <label>Delete
                        <input type="hidden" name="userId" value="<?= $user->getId() ?>">
                        <input type="submit" value="">
                    </label>
                </td>
            </form>
        </tr>
    <?php endforeach ?>
</table>
<a href="/home">home</a>