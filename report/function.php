<?php
$dbhost = 'localhost';
$dbname = 'management';
$dbuser = 'root';
$dbpass = 'root';

function dbconnect()
{
    global $pdo;

    try {
        $pdo = new PDO('mysql:host=' . $GLOBALS['dbhost'] . ';dbname=' . $GLOBALS['dbname'] . '', $GLOBALS['dbuser'], $GLOBALS['dbpass']);
    } catch (PDOException $e) {
        die('MySQL connection fail! ' . $e->getMessage());
    }
}

?>