<?php
    class dashTopNav{
        private $navView;
        public function __construct(){
            $navView = "assets/html/dashTopNav.php";
            require ($navView);
        }
    }
?>