<?php

$host = 'mysql';
$user = 'Amirreza';
$password = 'root';
$db = 'Library';
$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    echo "connection error --> " . mysqli_connect_error();
}

?>