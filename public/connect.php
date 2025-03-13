<?php
ob_start();
session_start();

use Dikki\DotEnv\DotEnv;
use Tracy\Debugger;
require __DIR__ . '/../vendor/autoload.php';
new DotEnv(__DIR__ . '/../')->load();
Debugger::enable(Debugger::DEVELOPMENT, __DIR__ . '/../tmp/log');

$dbhost = getenv('DB_HOST');
$dbuser = getenv('DB_USER');
$dbpass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');
$charset = "utf8";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon, $dbname);
mysqli_set_charset($dbcon, $charset);
