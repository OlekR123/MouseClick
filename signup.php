<?php
global $connect;
session_start();
require_once 'connect.php';

$login = isset($_POST['login']) ? $_POST['login'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$password_again = isset($_POST['password_again']) ? $_POST['password_again'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

$check_account = mysqli_query($connect, "SELECT * FROM `registration` WHERE `Login` = '$login'");

if (mysqli_num_rows($check_account) > 0) {
    $_SESSION['message'] = 'У вас уже есть аккаунт!';
    header('Location: index.php');
} else {
    if ($password === $password_again) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($connect, "INSERT INTO `registration` (`id_user`, `Login`, `Password`, `Email`) VALUES (NULL, '$login', '$hashed_password', '$email')");
        $_SESSION['user'] = [
            "name" => $login,
            "email" => $email
        ];
        header('Location: profile.php');
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: register.php');
    }
}
?>
