<?php
if (isset($_POST["email"])) {

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $errors = [];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_safe_query($query);

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors["phone"] = "Invalid phone number";
    }

    if (strlen($password) < 8) {
        $errors["password"] = "Password should be at least 8 characters long";
    }

    if (empty($email)) {
        $errors["email"] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email must be a valid email address";
    } else if (mysqli_num_rows($result)) {
        $errors["email"] = "Email already in use";
    }

    if (empty($errors)) {
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
