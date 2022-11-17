<?php
if (isset($_POST["email"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_safe_query($query);

    if (!mysqli_num_rows($result)) {
        $errors["email"] = "Invalid email";
    } else {
        $row = mysqli_fetch_assoc($result);
        $salt = $row["salt"];
        $hash_password = md5(md5($password) . md5($salt));
        if ($hash_password == $row["password"]) {
            session_start();
            $_SESSION["user_id"] = $row["id"];
            if ($row["admin"] == 1) {
                $_SESSION["admin"] = true;
            }
            header("Location: home.php");
        } else {
            $errors["password"] = "Invalid password";
        }
    }
}
