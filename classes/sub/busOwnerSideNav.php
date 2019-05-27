<?php
    class busOwnerSideNav{
        private $navView;
        public function __construct(){
            $navView = "assets/html/busOwnerSideNav.php";
            require ($navView);
        }
    }
?>