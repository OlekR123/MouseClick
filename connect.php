<?php

$connect = mysqli_connect("localhost", "root", "mysql", "users");
if (!$connect) {
    die('Connect Error');
}

