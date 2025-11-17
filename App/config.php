<?php

    // Ruta del script (p. ej. /index.php)
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    // Carpeta base donde está el index (normalizar sin slash final)
    $folderPath = rtrim(dirname($scriptName), '/');
    if ($folderPath === '') {
        $folderPath = '/';
    }

    // URI solicitada (sin query string)
    $urlPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

    // Si la app está en un subdirectorio, eliminar esa parte del path
    if ($folderPath !== '/' && strpos($urlPath, $folderPath) === 0) {
        $url = substr($urlPath, strlen($folderPath));
    } else {
        $url = $urlPath;
    }

    // Normalizar y eliminar posibles referencias a index.php
    $url = ltrim($url, '/');
    if ($url === 'index.php') {
        $url = '';
    }

    define('URL', $url);
    // URL_PATH usada para construir rutas a assets; asegurar slash final salvo raíz
    define('URL_PATH', $folderPath === '/' ? '/' : $folderPath . '/');

?>