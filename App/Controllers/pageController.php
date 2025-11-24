<?php 
    class PageController extends Controller
    {
        public function home(){
            $this->render('home', [], 'site');
        }

            public function servicios(){
                $this->render('servicios', [], 'site');
            }

            public function login(){
                $this->render('login', [], 'site');
            }

            public function legal(){
                $this->render('legal', [], 'site');
            }
    }

?>
