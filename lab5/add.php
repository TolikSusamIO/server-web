<?php require 'config.php';?>

<form method="post" action="?p=add">
       <input type="text"
              name="lastname"
              placeholder="Фамилия">
       <input type="text"
              name="firstname"
              placeholder="Имя">
       <input type="text"
              name="middlename"
              placeholder="Отчество">
       <select name="gender">
              <option value="М">М</option>
              <option value="Ж">Ж</option>
       </select>
       <input type="date"
              name="birthdate">
       <input type="text"
              name="phone"
              placeholder="Телефон">
       <input type="text"
              name="address"
              placeholder="Адрес">
       <input type="email"
              name="email"
              placeholder="Email">
       <textarea name="comment"
              placeholder="Комментарий"></textarea>
       <input type="submit"
              name="button"
              value="Добавить запись">

</form>

<?php
if(
    isset($_POST['button'])
    &&
    $_POST['button']
    ==
    'Добавить запись'
) { $sql = "

    INSERT INTO contacts
    (
        lastname,
        firstname,
        middlename,
        gender,
        birthdate,
        phone,
        address,
        email,
        comment
    )

    VALUES
    (
        '".htmlspecialchars($_POST['lastname'])."',
        '".htmlspecialchars($_POST['firstname'])."',
        '".htmlspecialchars($_POST['middlename'])."',
        '".htmlspecialchars($_POST['gender'])."',
        '".htmlspecialchars($_POST['birthdate'])."',
        '".htmlspecialchars($_POST['phone'])."',
        '".htmlspecialchars($_POST['address'])."',
        '".htmlspecialchars($_POST['email'])."',
        '".htmlspecialchars($_POST['comment'])."'
    )

    ";

    mysqli_query($mysqli, $sql);

    if(mysqli_errno($mysqli))
    {
        echo
        '<div class="error">
        Ошибка:
        запись не добавлена
        </div>';
    }
    else
    {
        echo
        '<div class="ok">
        Запись добавлена
        </div>';
    }
}

?>