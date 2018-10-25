<?php
//Start session is placed here since this is always run for every page
session_start();

require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

//$_GET is an array of controller and action as notified in .htaccess
/* when user inserts a url,  */
/* the url is sent to a new Bootstrap class */
/* the class accesses its createController method, */
/* which picks up the controller in the url corresponding to the  */
/* file in the controllers folder and returns a boolean */
/* if true, that is class exists, then it executes the contents of the file */
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
    $controller->executeAction();
}

?>