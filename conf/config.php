<?php

define("PUBLIC", "/var/www/eapluzhnik.ru/public");
define("ROOT", "/var/www/eapluzhnik.ru");
define("CONTROLLER_PATH", ROOT. "/controllers/");
define("MODEL_PATH", ROOT. "/models/");
define("VIEW_PATH", ROOT. "/views/");

preg_match('([\w\s]+\/)', $_SERVER['PHP_SELF'], $matches);
define("URL", $matches[0]);

const DB_USER = "root";
const DB_PASS = "pwd";
const DB_HOST = "localhost";
const DB_NAME   = "mvc";

const ADMIN_LOGIN = "admin";
const ADMIN_PASSWORD = "123";

// Задач на страницу
const TASK_LIMIT=3;

