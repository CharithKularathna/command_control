<?php
    class passengerSideNav{
        private $navView;
        public function __construct(){
            $navView = "assets/html/passengerSideNav.php";
            require ($navView);
        }
    }
?>