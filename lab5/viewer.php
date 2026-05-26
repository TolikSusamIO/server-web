<?php

function getContacts($type, $page)
{
    require 'config.php';

    if($type=='fam')
    {
        $order =
        'lastname ASC';
    }
    else if($type=='birth')
    {
        $order =
        'birthdate ASC';
    }
    else
    {
        $order =
        'id ASC';
    }

    $count =
    mysqli_query(
        $mysqli,
        "SELECT COUNT(*) FROM contacts"
    );

    $row =
    mysqli_fetch_row($count);

    $TOTAL = $row[0];

    if(!$TOTAL)
    {
        return 'Нет записей';
    }

    $PAGES =
    ceil($TOTAL / 10);

    $start =
    $page * 10;

    $sql =
    "SELECT * FROM contacts
     ORDER BY $order
     LIMIT $start,10";

    $res =
    mysqli_query($mysqli, $sql);

    $ret =
    '<table>';

    $ret .= '
    <tr>

    <th>Фамилия</th>
    <th>Имя</th>
    <th>Отчество</th>
    <th>Пол</th>
    <th>Дата рождения</th>
    <th>Телефон</th>
    <th>Адрес</th>
    <th>Email</th>
    <th>Комментарий</th>

    </tr>
    ';

    while(
        $row =
        mysqli_fetch_assoc($res)
    )
    {
        $ret .= '

        <tr>

        <td>'.$row['lastname'].'</td>

        <td>'.$row['firstname'].'</td>

        <td>'.$row['middlename'].'</td>

        <td>'.$row['gender'].'</td>

        <td>'.$row['birthdate'].'</td>

        <td>'.$row['phone'].'</td>

        <td>'.$row['address'].'</td>

        <td>'.$row['email'].'</td>

        <td>'.$row['comment'].'</td>

        </tr>

        ';
    }

    $ret .= '</table>';

    if($PAGES > 1)
    {
        $ret .=
        '<div id="pages">';

        for(
            $i=0;
            $i<$PAGES;
            $i++
        )
        {
            if($i != $page)
            {
                $ret .= '

                <a href="?p=viewer
                &sort='.$type.'
                &pg='.$i.'">

                '.($i+1).'

                </a>

                ';
            }
            else
            {
                $ret .=
                '<span>'.
                ($i+1).
                '</span>';
            }
        }

        $ret .= '</div>';
    }

    return $ret;
}
?>