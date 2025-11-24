<?php

class Router {
    private $controller;
    private $method;
    private $params = [];
    private $searchedFile;

    public function __construct()
    {
        $this->matchRoute();
    }

    private function sanitizeUrl($url) {
        // Quitar query string y normalizar barras
        $url = parse_url($url, PHP_URL_PATH);
        $url = trim($url, '/');
        return $url;
    }

    public function matchRoute(){
        $raw = URL; // viene de App/config.php
        $clean = $this->sanitizeUrl($raw);
        $segments = $clean === '' ? [] : explode('/', $clean);

        $ctrl = !empty($segments[0]) ? $segments[0] : 'Page';
        $mtd  = !empty($segments[1]) ? $segments[1] : 'home';

        $this->controller = ucfirst($ctrl) . 'Controller';
        $this->method = $mtd;
        // parámetros: todo lo que queda después de controller/method
        $this->params = array_slice($segments, 2);

        $controllerFile = __DIR__ . '/Controllers/' . $this->controller . '.php';
        // Guardar la ruta buscada para que send404 pueda registrarla correctamente
        $this->searchedFile = $controllerFile;
        if (!file_exists($controllerFile)) {
            $this->send404("Controller file not found: $controllerFile");
            return;
        }
        require_once($controllerFile);

        if (!class_exists($this->controller)) {
            $this->send404("Controller class not found: " . $this->controller);
            return;
        }
    }

    public function run(){
        if (!class_exists($this->controller)) {
            return; // ya enviado 404 en matchRoute
        }

        $controller = new $this->controller();

        if (!method_exists($controller, $this->method) || !is_callable([$controller, $this->method])) {
            $this->send404("Method not found: " . $this->method);
            return;
        }

        // Llamar con parámetros dinámicos
        call_user_func_array([$controller, $this->method], $this->params);
    }

    
}