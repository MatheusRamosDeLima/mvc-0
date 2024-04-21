<?php $users = $this->modelData ?>
<h1 class="content-title">Usuários</h1>
<section class="users-div">
    <?php foreach($users as $user): ?>
        <a href="/user/get/<?= $user->rowid ?>" class="user-link">
            <h2><?= $user->username ?></h2>
            <p>Idade: <?= $user->age ?> anos</p>
        </a>
    <?php endforeach ?>
</section>