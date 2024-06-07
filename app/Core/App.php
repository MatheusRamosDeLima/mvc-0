<?php

class App {
    private string $controller = 'HomeController';
    private string $method = 'index';
    private array $params = [];

    public function start(bool $useHtaccess) : void {
        $url = $this->parseUrl($useHtaccess);
        $this->defineControllerAndMethod($url);
        $this->isError404($this->controller, $this->method, $this->params);
        call_user_func_array([new $this->controller, $this->method], $this->params);
    }

    private function parseUrl(bool $useHtaccess) : array {
        if (!$useHtaccess) return $this->parseUrlWithRequestUri();
        return $this->parseUrlWithHtaccess();
    }
    private function parseUrlWithHtaccess() {
        if (isset($_GET['url'])) return explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        else return [];
    }
    private function parseUrlWithRequestUri() {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        if ($uri === '' || $uri === 'index.php') return [];
        if (str_contains($uri, '?')) $uri = trim(substr($uri, 0, strpos($uri, '?')), '/');
        $uri = explode('/', filter_var($uri, FILTER_SANITIZE_URL));
        return $uri;
    }
    private function defineControllerAndMethod(array $url) : void {
        if (isset($url[0])) {
            $this->controller = ucfirst($url[0]).'Controller';
            unset($url[0]);
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
                $this->params = array_values($url);
            }
        }
    }
    private function isError404(string $controller, string $method, array $params) : void {
        $controllerPath = __DIR__."/../Controllers/$controller.php";
        if (!file_exists($controllerPath) || !method_exists($controller, $method) || method_exists('Controller', $method) || !$this->isParamsValid($controller, $method, $params) || $method === '__construct') {
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