<?php
require_once __DIR__ . '/lib/DB/MysqliDb.php';
require_once __DIR__ . '/app/controllers/AdminController.php';
require_once __DIR__ . '/app/models/AdminModel.php';
require_once __DIR__ . '/app/controllers/CustomerController.php';
require_once __DIR__ . '/app/models/CustomerModel.php';

// $request =  $_SERVER['REQUEST_URI'];
// var_dump($request);
// define('BASE_PATH', '/');
define('BASE_PATH', '/air-lines/');

$config =  require_once __DIR__ . '/config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$box = (isset($_POST['box'])) ? $_POST['box'] : "admin";

if ($box === 'admin') {

    $model = new AdminModel($db);
    $controller = new AdminController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addAdmin();
    } elseif ($request == '/air-lines/update') {
        $controller->updateAdmin();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteAdmin();
    }
} elseif ($box === 'customer') {

    $model = new CustomerModel($db);
    $controller = new CustomerController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addCustomer();
    } elseif ($request == '/air-lines/update') {
        $controller->updateCustomer();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteCustomer();
    }
} elseif ($box === 'booking ') {

    $model = new BookingModel($db);
    $controller = new BookingController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addBooking();
    } elseif ($request == '/air-lines/update') {
        $controller->updatBooking();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteBooking();
    }
} elseif ($box === 'ticket ') {

    $model = new TicketModel($db);
    $controller = new TicketController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addTicket();
    } elseif ($request == '/air-lines/update') {
        $controller->updatTicket();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteTicket();
    }
} elseif ($box === 'booking ') {

    $model = new TicketModel($db);
    $controller = new TicketController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addTicket();
    } elseif ($request == '/air-lines/update') {
        $controller->updatTicket();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteTicket();
    }
} elseif ($box === 'city') {

    $model = new CityModel($db);
    $controller = new CityController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addCity();
    } elseif ($request == '/air-lines/update') {
        $controller->updateCity();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteCity();
    }
} elseif ($box === 'hotel') {

    $model = new HotelModel($db);
    $controller = new HotelController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addHotel();
    } elseif ($request == '/air-lines/update') {
        $controller->updateCity();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteHotel();
    }
} elseif ($box === 'company') {

    $model = new CompanyModel($db);
    $controller = new CompanyController($rate);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "select";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->select();
    } elseif ($request == '/air-lines/add') {
        $controller->addCompany();
    } elseif ($request == '/air-lines/update') {
        $controller->updateCompany();
    } elseif ($request == '/air-lines/delete') {
        $controller->deletecompany();
    }
}
