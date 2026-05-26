<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Записная книжка</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php

    require 'menu.php';

    if($_GET['p']=='viewer')
    {
        include 'viewer.php';

        if(
            !isset($_GET['pg'])
            ||
            $_GET['pg'] < 0
        )
        {
            $_GET['pg']=0;
        }

        if(
            !isset($_GET['sort'])
            ||
            (
                $_GET['sort']!='byid'
                &&
                $_GET['sort']!='fam'
                &&
                $_GET['sort']!='birth'
            )
        )
        {
            $_GET['sort']='byid';
        }

        echo getContacts(
            $_GET['sort'],
            $_GET['pg']
        );
    }
    else
    {
        if(file_exists($_GET['p'].'.php')){include $_GET['p'].'.php';}
    }
    ?>
    </body>
</html>