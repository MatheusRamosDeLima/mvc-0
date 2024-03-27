<?php

class Controller {
    private $modelData;

    private $viewTitle;

    protected function view(string $viewName, $modelData = [], bool $useLayout = true) {
        if ($useLayout) require_once "../app/Views/layout.php";
        else $this->loadView($viewName, $modelData);
    }
    private function loadView(string $viewName, $modelData) {
        $this->modelData = $modelData;
        extract($modelData);
        require_once "../app/Views/$viewName.php";
    }
    protected function setViewTitle(string $viewTitle) {
        $this->viewTitle = $viewTitle;
    }
}