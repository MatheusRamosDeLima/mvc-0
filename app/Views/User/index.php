<?php $users = $this->modelData ?>
<h1 class="content-title">Usuários</h1>
<section class="users-div">
    <?php foreach($users as $user): ?>
        <div class="user-div">
            <h2><?= $user->name ?></h2>
            <p>Email: <?= $user->email ?></p>
            <p>Senha: <?= $user->password ?></p>
        </div>
    <?php endforeach ?>
</section>