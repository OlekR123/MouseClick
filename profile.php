<?php
session_start();

if (!$_SESSION['user']){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <!--Иконка и название-->
    <div class="iconname">
        <img class="icon" src="icon.png" alt="">

        <div class="name">
            <div>Mouse</div>
            <div>Click</div>
        </div>
    </div>

    <div class="menu">
        <a class="menu1" href="">Главная</a>
        <a class="menu1" href="">Новости сайта</a>
    </div>

    <!--Логин, почта и иконка-->
    <div class="iconname">
        <div class="loginemail">
            <?php
            if(isset($_SESSION['user'])) {
                $username = $_SESSION['user']['name'];
                $email = $_SESSION['user']['email'];
                echo "<div>$username</div>";
                echo "<div>$email</div>";
            }
            ?>
        </div>

        <script>
            document.addEventListener("click", function(event) {
                var dropdownContent = document.getElementById("dropdown-content");
                var dropdown = document.getElementById("dropdown");

                // Проверяем, был ли клик вне выпадающего меню или на иконке профиля
                if (!dropdown.contains(event.target) && event.target !== dropdown) {
                    dropdownContent.style.display = "none";
                }
            });

            function toggleDropdown() {
                var dropdownContent = document.getElementById("dropdown-content");
                dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
            }
        </script>

        <div id="dropdown" class="dropdown" onclick="toggleDropdown()">
            <img class="profile" src="profileIcon.png" alt="">
            <div id="dropdown-content" class="dropdown-content">
                <a class="logout" href="logout.php">выход</a>
            </div>
        </div>
    </div>

</header>
</body>
</html>
