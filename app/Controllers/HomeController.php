<?php

class HomeController extends Controller {
    public function index() : void {
        $this->setViewTitle('Página home');
        $this->view('Home/index');
    }
}