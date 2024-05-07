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
        if (strpos($uri, 'index.php/') === 0) $uri = substr($uri, strlen('index.php/'));
        if ($uri === '' || $uri === 'index.php') return [];
        $uri = explode('/', filter_var($uri, FILTER_SANITIZE_URL));
        foreach ($uri as $i => $value) {
            if(str_contains($value, '?')) $uri[$i] = substr($value, 0, strpos($value, '?'));
            if ($uri[$i] === '') unset($uri[$i]);
        }
        return $uri;
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
        $controllerPath = __DIR__."/../Controllers/$controller.php";
        echo "<h2>Test in isError404!</h2>";
        echo !file_exists($controllerPath) ? "<p>Controller file doesn't exist</p>" : "<p>Controller file exists</p>";
        echo !method_exists($controller, $method) ? "<p>Method $method doesn't exist in $controller</p>" : "<p>Method $method exists in $controller</p>";
        echo method_exists('Controller', $method) ? "<p>Method $method exists in Controller</p>" : "<p>Method $method doesn't exist in Controller</p>";
        echo !$this->isParamsValid($controller, $method, $params) ? "<p>The params aren't valid</p>" : "<p>The params are valid</p>";
        echo $method === '__construct' ? "<p>The method is construct</p>" : "<p>The method isn't construct</p>";
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