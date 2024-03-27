<?php

class App {
    private string $controller = 'HomeController';
    private string $method = 'index';
    private array $params = [];

    public function start() {
        $url = $this->parseUrl();
        $this->defineControllerAndMethod($url);
        $this->isError404($this->controller, $this->method, $this->params);
        call_user_func_array([new $this->controller, $this->method], $this->params);
    }

    private function parseUrl() : array {
        if (isset($_GET['url'])) return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        else return [];
    }
    private function defineControllerAndMethod(array $url) : void {
        if (isset($url[0])) {
            $this->controller = $url[0].'Controller';
            unset($url[0]);
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
                $this->params = array_values($url);
            }
        }
    }
    private function isError404(string $controller, string $method, array $params) : void {
        $controllerPath = "../app/Controllers/$controller.php";
        if (!file_exists($controllerPath) || !method_exists($controller, $method) || method_exists('Controller', $method) || !$this->isParamsValid($controller, $method, $params)) {
            $this->controller = 'ErrorController';
            $this->method = 'index';
            $this->params = [];
        }
    }
    private function isParamsValid(string $controller, string $method, array $params) : bool {
        $reflectionMethod = new ReflectionMethod($controller, $method);
        $expectedParams = $reflectionMethod->getParameters();

        return (count($params) === count($expectedParams));
    }
}