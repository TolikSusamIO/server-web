<div id="menu">

<?php

if(
    !isset($_GET['p'])
)
{
    $_GET['p'] = 'viewer';
}

$allowed = [
    'viewer',
    'add',
    'edit',
    'delete'
];

if(
    !in_array($_GET['p'], $allowed)
)
{
    die("Ошибка");
}

?>

<a href="?p=viewer"

<?php
if($_GET['p']=='viewer')
{
    echo 'class="selected"';
}
?>

>
Просмотр
</a>

<a href="?p=add"

<?php
if($_GET['p']=='add')
{
    echo 'class="selected"';
}
?>

>
Добавление записи
</a>

<a href="?p=edit"

<?php
if($_GET['p']=='edit')
{
    echo 'class="selected"';
}
?>

>
Редактирование записи
</a>

<a href="?p=delete"

<?php
if($_GET['p']=='delete')
{
    echo 'class="selected"';
}
?>

>
Удаление записи
</a>

</div>

<?php

if($_GET['p']=='viewer')
{

echo '<div id="submenu">';

echo '<a href="?p=viewer&sort=byid"';

if(
    !isset($_GET['sort'])
    ||
    $_GET['sort']=='byid'
)
{
    echo ' class="selected"';
}

echo '>По добавлению</a>';

echo '<a href="?p=viewer&sort=fam"';

if(
    isset($_GET['sort'])
    &&
    $_GET['sort']=='fam'
)
{
    echo ' class="selected"';
}

echo '>По фамилии</a>';

echo '<a href="?p=viewer&sort=birth"';

if(
    isset($_GET['sort'])
    &&
    $_GET['sort']=='birth'
)
{
    echo ' class="selected"';
}

echo '>По дате рождения</a>';

echo '</div>';

}
?>