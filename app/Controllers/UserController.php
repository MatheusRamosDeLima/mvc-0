<?php

class UserController extends Controller {
    private User $userModel;

    public function __construct() {
        $this->userModel = new User;
    }

    public function index() : void {
        $users = $this->userModel->getAllUsers();

        $this->setViewTitle('Página de usuários');
        $this->setViewCss('user/index');

        $this->view('User/index', $users);
    }
    public function get($id) : void {
        $user = $this->userModel->getUser($id);

        $this->setViewTitle('Página do usuário '.$user->username);
        $this->setViewCss('user/index');

        $this->view('User/get', $user);
    }
}