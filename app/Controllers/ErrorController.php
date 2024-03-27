<?php

class ErrorController extends Controller {
    public function index() : void {
        $this->view('error', [], false);
    }
}