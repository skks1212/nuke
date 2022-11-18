<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="../css/adminstyle.css">

    <?php
    include '../inc/db/mysql.php';

    session_start();

    if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
        header('location:../login');
    };
    ?>
</head>