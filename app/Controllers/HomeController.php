<?php

class HomeController extends Controller {
    public function index() {
        $this->setViewTitle('Página home');
        $this->view('Home/index');
    }
}