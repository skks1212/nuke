<?php

use function PHPSTORM_META\type;

include "inc/db/mysql.php";
session_start();

if (isset($_SESSION["user_id"])) {
    $get_user = mysqli_safe_query("SELECT * FROM users WHERE id = %d", $_SESSION["user_id"]);
    if (!mysqli_num_rows($get_user)) {
        header("Location: login.php");
    }

    $user = mysqli_fetch_object($get_user);
}
