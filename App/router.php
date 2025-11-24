<?php

class Router {
    private $controller;
    private $method;
    private $params = [];
    private $searchedFile;
    private $routes;

    public $before = []; // array of callables
    public $after = [];

    public function __construct()
    {
        $routesFile = __DIR__ . '/routes.php';
        $this->routes = file_exists($routesFile) ? require $routesFile : [];
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
        // Si existen rutas definidas en App/routes.php, probar coincidencias primero
        if (!empty($this->routes) && is_array($this->routes)) {
            $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
            $methodRoutes = $this->routes[$method] ?? ($this->routes['ANY'] ?? []);
            foreach ($methodRoutes as $pattern => $target) {
                $regex = '#^' . $pattern . '$#';
                if (preg_match($regex, $clean, $matches)) {
                    // target esperado: Controller@method or Controller@method:$1:$2
                    $parts = explode('@', $target);
                    $ctrlPart = $parts[0] ?? null;
                    $mtdPart = $parts[1] ?? 'home';
                    // Normalizar nombres
                    if ($ctrlPart !== null) {
                        if (strpos($ctrlPart, 'Controller') === false) {
                            $ctrlPart = $ctrlPart . 'Controller';
                        }
                        $this->controller = ucfirst($ctrlPart);
                    }
                    $this->method = $mtdPart;
                    // Parámetros: si el target tiene :n usa esos, si no toma los capture groups
                    $params = [];
                    if (strpos($target, ':') !== false) {
                        $sub = explode(':', $target);
                        for ($i = 1; $i < count($sub); $i++) {
                            $p = $sub[$i];
                            if (is_numeric($p) && isset($matches[(int)$p])) {
                                $params[] = $matches[(int)$p];
                            } else {
                                $params[] = $p;
                            }
                        }
                    } else {
                        $params = array_values(array_slice($matches, 1));
                    }
                    $this->params = $params;

                    // Intentar cargar el archivo del controlador (case-insensitive)
                    $controllerFile = __DIR__ . '/Controllers/' . $this->controller . '.php';
                    if (!file_exists($controllerFile)) {
                        $dir = __DIR__ . '/Controllers';
                        if (is_dir($dir)) {
                            foreach (scandir($dir) as $f) {
                                if ($f === '.' || $f === '..') continue;
                                if (strcasecmp($f, basename($controllerFile)) === 0) {
                                    $controllerFile = $dir . '/' . $f;
                                    break;
                                }
                            }
                        }
                    }

                    if (!file_exists($controllerFile)) {
                        $this->send404("Controller file not found: $controllerFile");
                        return;
                    }

                    require_once $controllerFile;

                    if (!class_exists($this->controller)) {
                        $this->send404("Controller class not found: " . $this->controller);
                        return;
                    }

                    return;
                }
            }
        }
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
            $dir = __DIR__ . '/Controllers';
            if (is_dir($dir)) {
                foreach (scandir($dir) as $f) {
                    if ($f === '.' || $f === '..') continue;
                    if (strcasecmp($f, basename($controllerFile)) === 0) {
                        $controllerFile = $dir . '/' . $f;
                        $this->searchedFile = $controllerFile;
                        break;
                    }
                }
            }
        }
        if (!file_exists($controllerFile)) {
            $this->send404("Controller file not found: $controllerFile");
            return;
        }
        require_once $controllerFile;

        if (!class_exists($this->controller)) {
            $this->send404("Controller class not found: " . $this->controller);
            return;
        }

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $routesFile = __DIR__ . '/routes.php';
        if (file_exists($routesFile)) {
            $routes = require $routesFile;
            $methodRoutes = $routes[$method] ?? ($routes['ANY'] ?? []);
            foreach ($methodRoutes as $pattern => $target) {
                // convertir pattern literal a ^pattern$ y probar
                $regex = '#^' . $pattern . '$#';
                if (preg_match($regex, $clean, $matches)) {
                    // target puede ser Controller@method or Controller@method:$1
                    // extraer controller/method y parámetros
                    // set $this->controller, $this->method, $this->params
                    break;
                }
            }
        }
    }

    public function run(){
        if (!class_exists($this->controller)) {
            return; // ya enviado 404 en matchRoute
        }

        try {
            $controller = new $this->controller();
            if (!is_callable([$controller, $this->method])) {
                $this->send404("Method not found: " . $this->method);
                return;
            }
            call_user_func_array([$controller, $this->method], $this->params);
        } catch (Throwable $e) {
            error_log($e);
            http_response_code(500);
            // cargar vista 500 o mostrar mensaje en DEBUG
            echo "Internal Server Error";
        }
    }

    // Mostrar la página 404 y salir
    private function send404($msg = '') {
        if (!headers_sent()) {
            http_response_code(404);
            header('Content-Type: text/html; charset=utf-8');
        } else {
            http_response_code(404);
        }

        $view = __DIR__ . '/Views/404.view.php';
        if (file_exists($view)) {
            require_once $view;
            exit;
        }

        // Fallback simple si la vista no existe
        echo '<!doctype html><html><head><meta charset="utf-8"><title>404 Not Found</title></head><body>';
        echo '<h1>404 Not Found</h1>';
        if ($msg !== '') {
            echo '<p>' . htmlspecialchars($msg, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
        }
        echo '</body></html>';
        exit;
    }
    
}