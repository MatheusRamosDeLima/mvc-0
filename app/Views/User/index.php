<?php $users = $this->modelData ?>
<h1>Usuários</h1>
<?php 

foreach ($users as $user) {
    echo "<hr>";
    echo "<h2>Usuário</h2>";
    echo "<p>Nome: {$user->name}</p>";
    // echo "<p>Email: {$user->email}</p>";
    // echo "<p>Senha: {$user->password}</p>";

    // foreach ($user as $column => $row) {
    //     echo "<p>$column: $row</p>";
    // }
    echo "<hr>";
}

?>