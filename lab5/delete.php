<?php

require 'config.php';

if(isset($_GET['id']))
{
    $res =
    mysqli_query(
        $mysqli,
        "
        SELECT lastname
        FROM contacts
        WHERE id=".$_GET['id']."
        "
    );

    $row =
    mysqli_fetch_assoc($res);

    mysqli_query(
        $mysqli,
        "
        DELETE FROM contacts
        WHERE id=".$_GET['id']."
        "
    );

    echo '

    <div class="error">

    Запись с фамилией
    '.$row['lastname'].'
    удалена

    </div>

    ';
}

$res =
mysqli_query(
    $mysqli,
    "
    SELECT id,
           lastname,
           firstname,
           middlename
    FROM contacts
    ORDER BY lastname,
             firstname
    "
);

echo '<div id="delete_links">';

while(
    $row =
    mysqli_fetch_assoc($res)
)
{
    $fio =
    $row['lastname'].' '.
    mb_substr(
        $row['firstname'],
        0,
        1
    ).'.'.

    mb_substr(
        $row['middlename'],
        0,
        1
    ).'.';

    echo '

    <a href="?p=delete&id='.
    $row['id'].
    '">

    '.$fio.'

    </a><br>

    ';
}

echo '</div>';

?>