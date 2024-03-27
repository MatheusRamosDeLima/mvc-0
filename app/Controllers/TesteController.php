<?php

class TesteController extends Controller {
    public function index() {
        $this->setViewTitle('Página Teste - principal');
        $this->view('Teste/index');
    }
    public function pag1() {
        $this->setViewTitle('Página Teste - página 1');
        $this->view('Teste/pag1');
    }
    public function pag2() {
        $this->setViewTitle('Página Teste - página 2');
        $this->view('Teste/pag2');
    }
}