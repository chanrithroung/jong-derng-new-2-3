<?php 
    include("function.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        UserAccepLogout();
        header("Location: login.php");
    } 
?>
