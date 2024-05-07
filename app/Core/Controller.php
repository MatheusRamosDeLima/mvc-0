<?php

class Controller {
    private $modelData;

    private string $viewTitle;
    private string $viewCss;
    private string $viewJs;

    protected function view(string $viewName, $modelData = [], bool $useLayout = true) : void {
        if ($useLayout) require_once __DIR__.'/../app/Views/layout.php';
        else $this->loadView($viewName, $modelData);
    }
    private function loadView(string $viewName, $modelData) : void {
        $this->modelData = $modelData;
        require_once __DIR__."/../app/Views/$viewName.php";
    }
    protected function setViewTitle(string $viewTitle) : void {
        $this->viewTitle = $viewTitle;
    }
    protected function setViewCss(string $viewCss) : void {
        $this->viewCss = $viewCss;
    }
    protected function setViewJs(string $viewJs) : void {
        $this->viewJs = $viewJs;
    }
}