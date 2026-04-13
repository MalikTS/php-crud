<?php

    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "server_crud_operation");

    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$connection) {
        die("Ошибка при подключении к БД");
    } else {
        echo "";
    }

?>
