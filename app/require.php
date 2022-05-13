<?php
session_start();
//Require libraries
require_once '../app/libraries/Core.php';
require_once '../app/libraries/Database.php';
require_once '../app/libraries/Controller.php';


require_once 'config/config.php';

//Instantiate core class
$init = new Core();
