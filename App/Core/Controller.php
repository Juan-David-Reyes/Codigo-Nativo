<?php

class Controller{
    protected function render($path ,$paramenter = [], $layout = ''){
        require_once(__DIR__ . '/../Views/'.$path.'.view.php');
    }
}