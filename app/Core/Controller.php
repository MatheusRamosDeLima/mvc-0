<?php

class Controller {
    private $modelData;

    private string $viewTitle;

    protected function view(string $viewName, $modelData = [], bool $useLayout = true) : void {
        if ($useLayout) require_once "../app/Views/layout.php";
        else $this->loadView($viewName, $modelData);
    }
    private function loadView(string $viewName, $modelData) : void {
        $this->modelData = $modelData;
        extract($modelData);
        require_once "../app/Views/$viewName.php";
    }
    protected function setViewTitle(string $viewTitle) : void {
        $this->viewTitle = $viewTitle;
    }
}