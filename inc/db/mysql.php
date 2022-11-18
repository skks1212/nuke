<?php
function mysqli_safe_string($value)
{
    global $con;
    $value = trim($value);
    if (empty($value))           return 'NULL';
    elseif (is_numeric($value))  return $value;
    else                        return "'" . mysqli_real_escape_string($con, $value) . "'";
}

function mysqli_safe_query($query)
{
    global $con;
    $args = array_slice(func_get_args(), 1);
    $args = array_map('mysqli_safe_string', $args);
    //echo "<script>console.log(`" . vsprintf($query, $args) . "`)</script>";
    return mysqli_query($con, vsprintf($query, $args));
}

$con = mysqli_connect($_SERVER["DB_HOST"], $_SERVER["DB_USER"], $_SERVER["DB_PASS"], $_SERVER["DB_DB"]);

mysqli_select_db($con, $_SERVER["DB_DB"]) or die('OOPS! THERE WAS AN ERROR CONNECTING TO OUR SERVER!.');
