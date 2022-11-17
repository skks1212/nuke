<?php
include "inc/fn/auth.php";
$id = $_GET['id'];
add_to_cart($id);
echo "success";
