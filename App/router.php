<?php

class Router {
    private $controller;
    private $method;
    private $params = [];

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

        $controllerFile = __DIR__ . '/controllers/' . $this->controller . '.php';
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

    private function send404($msg = '') {
        // Intentar establecer código y cabecera si es posible
        if (!headers_sent()) {
            http_response_code(404);
            header('Content-Type: text/html; charset=utf-8');
        } else {
            http_response_code(404);
        }

        // Registrar para diagnóstico (no mostrar en producción)
        $request = $_SERVER['REQUEST_URI'] ?? '';
        error_log(sprintf("404: %s | URI: %s", $msg, $request));

        $view = __DIR__ . '/Views/404.view.php';
        // Escribir un log público temporal para diagnóstico en el root
        $debugPath = __DIR__ . '/../debug_server.txt';
        $debugData = [
            'time' => date('c'),
            'msg' => $msg,
            'request_uri' => $_SERVER['REQUEST_URI'] ?? null,
            'script_name' => $_SERVER['SCRIPT_NAME'] ?? null,
            'controller' => $this->controller ?? null,
            'method' => $this->method ?? null,
            'params' => $this->params ?? null,
            'controller_file_searched' => isset($controllerFile) ? $controllerFile : (__DIR__ . '/controllers/' . ($this->controller ?? 'unknown') . '.php'),
            'url' => defined('URL') ? URL : null,
            'url_path' => defined('URL_PATH') ? URL_PATH : null,
        ];
        @file_put_contents($debugPath, json_encode($debugData, JSON_PRETTY_PRINT));

        if (defined('URL_PATH') && file_exists($view)) {
            require_once $view;
            exit;
        }

        // Fallback sencillo. Mostrar mensaje detallado solo en DEBUG/entorno dev.
        $isDebug = (defined('DEBUG') && DEBUG === true) || (defined('APP_ENV') && APP_ENV === 'development');
        $safeMsg = $isDebug && $msg !== '' ? htmlspecialchars($msg, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') : '';

        echo '<!doctype html><html><head><meta charset="utf-8"><title>404 Not Found</title></head><body>';
        echo '<h1>404 Not Found</h1>';
        if ($safeMsg !== '') {
            echo '<p>' . $safeMsg . '</p>';
        } else {
            echo '<p>The requested resource could not be found.</p>';
        }
        echo '</body></html>';
        exit;
    }
}