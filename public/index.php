<?php
//ini_set('display_errors', 1);

require_once("../conf/config.php");

// Соединяемся с БД

try {
        $dbObject = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
}

require_once("../route.php");
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';
require_once CONTROLLER_PATH. 'Controller.php';


Routing::buildRoute();

