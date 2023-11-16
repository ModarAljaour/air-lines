<?php
require_once __DIR__ . '/app/controllers/TicketController.php';
require_once __DIR__ .'/app/models/TicketModel.php';
require_once __DIR__ .'/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';
$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);
use TicketController\ticketcontroller;
use TicketModel\ticketmodel ;
$model = new TicketModel($db);
$controller = new TicketController($model);
$controller->updatTicket();
