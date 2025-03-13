<?php
ob_start();
session_start();

use Dikki\DotEnv\DotEnv;
require __DIR__ . '/../../api/vendor/autoload.php';
new DotEnv(__DIR__ . '/../api')->load();

$dbhost = getenv('DB_HOST');
$dbuser = getenv('DB_USERNAME');
$dbpass = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');
$charset = "utf8";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon, $dbname);
mysqli_set_charset($dbcon, $charset);
