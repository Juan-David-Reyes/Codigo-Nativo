<?php 
    class pageController extends Controller
    {
        public function home(){
            //require_once(__DIR__ . '/../Views/inicio.view.php');
            $this->render('home', [], 'site');
        }
        public function quiz(){
            $this->render('quiz');
        }
        // public function modificar(){
        //     echo 'estoy en modificar';
        // }
        // public function eliminar(){
        //     echo 'estoy en eliminar';
        // }
    }
    
?>