<?php
require_once __DIR__ . '/lib/DB/MysqliDb.php';
// require_once __DIR__ . '/app/controllers/AdminController.php';
// require_once __DIR__ . '/app/models/AdminModel.php';
require_once __DIR__ . '/app/controllers/CustomerController.php';
require_once __DIR__ . '/app/models/CustomerModel.php';

$request =  $_SERVER['REQUEST_URI'];
define('BASE_PATH', '/air-lines/');

$config =  require_once __DIR__ . '/config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);


// $model = new AdminModel($db);
// $controller = new AdminController($model);
// $controller->addAdmin();
// $controller ->deleteAdmin();
// $controller->updateAdmin();

// customers : 
$model = new CustomerModel($db);
$controller = new CustomerController($model);
$controller->addCustomer();
// $controller ->deleteCustomer();
// $controller->updateCustomer();


switch ($request) {
    case BASE_PATH:
        $controller->index();
        break;

        // case BASE_PATH . 'add':
        //     $controller->addUser();
        //     break;
        // case BASE_PATH . 'show?id=' . $_GET["id"]:
        //     $controller->getUserByID();
        //     break;
        // case BASE_PATH . 'update?id=' . $_GET["id"]:
        //     $controller->updateUser();
        //     break;
        // case BASE_PATH . 'delete?id=' . $_GET["id"]:
        //     $controller->deleteUser();
        //     break;
}
