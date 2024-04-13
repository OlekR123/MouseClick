<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<!--Регистрация-->

<form action="signup.php" method="post">
    <lable>Логин</lable>
    <input type="text" name="login" placeholder="Введите свой логин...">
    <lable>Пароль</lable>
    <input type="password" name="password" placeholder="Введите пароль...">
    <lable>Повтор пароля</lable>
    <input type="password" name="password_again" placeholder="Повтор пароля...">
    <lable>Почта</lable>
    <input type="email" name="email" placeholder="Введите адрес почты...">
    <button type="submit">Зарегестрироваться</button>
    <p>
        Уже есть аккаунт?
        <a href="index.php">&nbspАвторизируйтесь</a>!
    </p>
    <?php
        if (isset($_SESSION['message']))
        {
            echo '<p class="msg"> '. $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
    ?>

</form>

</body>
</html>