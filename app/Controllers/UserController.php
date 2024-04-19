<?php

class UserController extends Controller {
    public function index() : void {
        $this->setViewTitle('Página sobre o usuário');
        $this->setViewCss('user/index');

        $users = (new User)->getUsers();

        $this->view('User/index', $users);
    }
}