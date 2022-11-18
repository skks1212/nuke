<?php
if (isset($_POST["email"])) {

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $errors = [];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_safe_query($query);

    if (mysqli_num_rows($result)) {
        $errors["email"] = "Email already in use";
    } else {
        $salt = rand(1000000000, 9999999999);
        $hash_password = md5(md5($password) . md5($salt));
        $query = "INSERT INTO users (name, email, phone, password, salt) VALUES ('$name', '$email', '$phone', '$hash_password', '$salt')";
        $result = mysqli_safe_query($query);
        if ($result) {
            header("Location: login");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
            exit;
        }
    }
}
