<?php

class TesteController extends Controller {
    public function index() : void {
        $this->setViewTitle('Página Teste - principal');
        $this->view('Teste/index');
    }
    public function pag1() : void {
        $this->setViewTitle('Página Teste - página 1');
        $this->view('Teste/pag1');
    }
    public function pag2() : void {
        $this->setViewTitle('Página Teste - página 2');
        $this->view('Teste/pag2');
    }
}