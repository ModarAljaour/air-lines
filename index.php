<?php

// require_once __DIR__ . '/app/controllers/CityController.php';
// require_once __DIR__ .'/app/models/CityModel.php';
require_once __DIR__ . '/app/controllers/HotelController.php';
require_once __DIR__ .'/app/models/HotelModel.php';
require_once __DIR__ .'/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';
// use model_city;
// use control_city;

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);


// $request=$_SERVER['REQUEST_URI'];
// define('BASE_PATH','/air-lines/');
//var_dump($request);

// $model = new CityModel($db);
// $controller = new CityController($model);

//$controller->index();
//$controller->addCity();
 //$controller->updateCity();
//  $controller->deleteCity(); 
                 
////////////Hotels
$model = new HotelModel($db);
$controller = new HotelController($model);
//$controller->index();
//$controller->addHotel();
 //$controller->updateHotel();
//$controller->deleteHotel(); 

?>
