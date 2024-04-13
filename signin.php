<?php
global $connect;
session_start();
require_once 'connect.php';

$login = isset($_POST['login']) ? $_POST['login'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$check_user = mysqli_query($connect, "SELECT * FROM `registration` WHERE `Login` = '$login'");

if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $hashed_password = $user['Password'];

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['Login'],
            "email" => $user['Email']
        ];
        header('Location: profile.php');
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: index.php');
    }
} else {
    $_SESSION['message'] = 'Вы ещё не зарегистрированы';
    header('Location: register.php');
}
?>
