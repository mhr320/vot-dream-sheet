<?php

require "config.php";
require "functions.php";
require "controller.php";
require "database.php";
require "model.php";
require "app.php";

spl_autoload_register(function($class_name){

	require "../private/models/" . ucfirst($class_name) . ".php";

});