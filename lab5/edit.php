<?php

require 'config.php';

if(
    isset($_POST['button'])
    &&
    $_POST['button']
    ==
    'Изменить запись'
)
{
    $sql = "

    UPDATE contacts

    SET

    lastname='".htmlspecialchars($_POST['lastname'])."',
    firstname='".htmlspecialchars($_POST['firstname'])."',
    middlename='".htmlspecialchars($_POST['middlename'])."',
    gender='".htmlspecialchars($_POST['gender'])."',
    birthdate='".htmlspecialchars($_POST['birthdate'])."',
    phone='".htmlspecialchars($_POST['phone'])."',
    address='".htmlspecialchars($_POST['address'])."',
    email='".htmlspecialchars($_POST['email'])."',
    comment='".htmlspecialchars($_POST['comment'])."'

    WHERE id=".$_GET['id'];

    mysqli_query($mysqli, $sql);

    echo
    '<div class="ok">
    Данные изменены
    </div>';
}

$currentROW = array();

if(isset($_GET['id']))
{
    $sql = "

    SELECT *

    FROM contacts

    WHERE id=".$_GET['id']."

    LIMIT 0,1

    ";

    $res =
    mysqli_query($mysqli, $sql);

    $currentROW =
    mysqli_fetch_assoc($res);
}

if(!$currentROW)
{
    $res =
    mysqli_query(
        $mysqli,
        "SELECT * FROM contacts
         ORDER BY lastname
         LIMIT 0,1"
    );

    $currentROW =
    mysqli_fetch_assoc($res);
}

$res =
mysqli_query(
    $mysqli,
    "
    SELECT id,
           lastname,
           firstname
    FROM contacts
    ORDER BY lastname,
             firstname
    "
);

echo '<div id="edit_links">';

while(
    $row =
    mysqli_fetch_assoc($res)
)
{
    if(
        $currentROW['id']
        ==
        $row['id']
    )
    {
        echo
        '<div class="current">'.
        $row['lastname'].' '.
        $row['firstname'].
        '</div>';
    }
    else
    {
        echo '

        <a href="?p=edit&id='.
        $row['id'].
        '">

        '.
        $row['lastname'].' '.
        $row['firstname'].

        '</a>

        ';
    }
}

echo '</div>';

if($currentROW)
{

?>

<form method="post"
      action="?p=edit&id=<?=$currentROW['id']?>">
<input type="text"
       name="lastname"
       value="<?=$currentROW['lastname']?>">
<input type="text"
       name="firstname"
       value="<?=$currentROW['firstname']?>">
<input type="text"
       name="middlename"
       value="<?=$currentROW['middlename']?>">
    <select name="gender">
        <option
        <?php
        if($currentROW['gender']=='М')
        echo 'selected';
        ?>>
        М
        </option>

        <option
        <?php
        if($currentROW['gender']=='Ж')
        echo 'selected';
        ?>>
        Ж
        </option>
    </select>
    <input type="date"
        name="birthdate"
        value="<?=$currentROW['birthdate']?>">
    <input type="text"
        name="phone"
        value="<?=$currentROW['phone']?>">
    <input type="text"
        name="address"
        value="<?=$currentROW['address']?>">
    <input type="email"
        name="email"
        value="<?=$currentROW['email']?>">
    <textarea name="comment"><?=$currentROW['comment']?></textarea>
    <input type="submit"
        name="button"
        value="Изменить запись">
</form>

<?php

}
else
{
    echo 'Записей пока нет';
}

?>