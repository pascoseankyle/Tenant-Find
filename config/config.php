<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "tenant_find";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Something Went Wrong')</script>");
}

?>