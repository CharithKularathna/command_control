<?php
session_start();

require('config.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');

require('classes/sub/busOwnerSideNav.php');
require('classes/sub/dashTopNav.php');
require('classes/sub/passengerSideNav.php');
require('classes/sub/busScheduleDiv.php');
require('classes/sub/checkBookingsDiv.php');
require('classes/sub/seatBookingsDiv.php');
require('classes/sub/balanceDiv.php');
require('classes/sub/depositForm.php');

require('controllers/home.php');
require('controllers/passenger.php');
require('controllers/busOwner.php');
require('controllers/schedule.php');


require('models/homeModel.php');
require('models/passengerModel.php');
require('models/busOwnerModel.php');
require('models/scheduleModel.php');


$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();
if($controller){
    $controller->executeAction();
}

?>