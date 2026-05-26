<?php

$mysqli = mysqli_connect(
    "localhost",
    "root",
    "",
    "notebook"
);

if(mysqli_connect_errno())
{
    die(
        "Ошибка подключения: ".
        mysqli_connect_error()
    );
}

mysqli_set_charset($mysqli, "utf8");
?>