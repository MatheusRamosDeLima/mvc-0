<?php

class UserController extends Controller {
    public function index() : void {
        $this->setViewTitle('Página sobre o usuário');

        $users = (new User)->getUsers();

        $dados['name'] = 'Matheus';
        $dados['age'] = 16;
        $this->view('User/index', $users);
    }
}