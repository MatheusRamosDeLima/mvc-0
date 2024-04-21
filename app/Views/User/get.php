<?php $user = $this->modelData ?>
<h1><?= $user->username ?></h1>
<section>
    <div class="login-info">
        <p>Email: <?= $user->email ?></p>
        <p>Senha: <?= $user->password ?></p>
    </div>
    <div class="personal-info">
        <p>Idade: <?= $user->age ?></p>
        <p><?= $user->text_user ?></p>
    </div>
</section>