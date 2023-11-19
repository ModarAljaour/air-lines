<?php
require_once __DIR__ . '/lib/DB/MysqliDb.php';
spl_autoload_register(function ($className) {
    if (file_exists("app/models/$className.php")) {
        require "app/models/" . $className . ".php";
    }
    if (file_exists("app/controllers/$className.php")) {
        require "app/controllers/" . $className . ".php";
    }
});

$request =  $_SERVER['REQUEST_URI'];
// var_dump($request);
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
    echo 'admin';
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
} elseif ($box === 'booking') {

    echo 'book';

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
} elseif ($box === 'ticket') {

    $model = new TicketModel($db);
    $controller = new TicketController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->index();
    } elseif ($request == '/air-lines/add') {
        $controller->addTicket();
    } elseif ($request == '/air-lines/update') {
        $controller->updateTicket();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteTicket();
    }
} elseif ($box === 'rate') {

    $model = new RateModel($db);
    $controller = new RateController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->select();
    } elseif ($request == '/air-lines/add') {
        $controller->addrate();
    } elseif ($request == '/air-lines/update') {
        $controller->updateRated($_GET['id']);
    } elseif ($request == '/air-lines/delete') {
        $controller->deleterate($_GET['id']);
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
        $controller->updateCity($_GET['id']);
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteCity($_GET['id']);
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
        $controller->updateHotel();
    } elseif ($request == '/air-lines/delete') {
        $controller->deleteHotel($_GET['id']);
    }
} elseif ($box === 'company') {

    $model = new CompanyModel($db);
    $controller = new CompanyController($model);

    $action = (isset($_POST['action'])) ? $_POST['action'] : "index";

    $request =  BASE_PATH . $action;

    if ($request == '/air-lines/index') {
        $controller->select();
    } elseif ($request == '/air-lines/add') {
        $controller->addCompany();
    } elseif ($request == '/air-lines/update') {
        $controller->updateCompany($_GET['id']);
    } elseif ($request == '/air-lines/delete') {
        $controller->deletecompany($_GET['id']);
    }
}
