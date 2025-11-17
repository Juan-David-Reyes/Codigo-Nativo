<?php
    require_once(__DIR__ . '/App/autoload.php');


    // al principio de index.php justo después del require/autoload (temporal)
    file_put_contents(__DIR__ . '/debug.txt', json_encode([
    'REQUEST_URI' => $_SERVER['REQUEST_URI'] ?? null,
    'SCRIPT_NAME' => $_SERVER['SCRIPT_NAME'] ?? null,
    'DOCUMENT_ROOT' => $_SERVER['DOCUMENT_ROOT'] ?? null,
    'URL' => defined('URL') ? URL : null,
    'URL_PATH' => defined('URL_PATH') ? URL_PATH : null,
    ], JSON_PRETTY_PRINT));

    $router = new Router();
    $router->run();

?>