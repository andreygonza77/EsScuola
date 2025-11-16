<?php
session_start();

if(!isset($_SESSION["error"])){
    $_SESSION["error"] = "";
}

if(!isset($_SESSION["login"])){
    $_SESSION["login"] = false;
}

if(!isset($_SESSION["username"])){
    $_SESSION["username"] = "";
}

if(isset($_POST["logout"])){
    session_destroy();
}


$username = "admin";
$password = "1234";
$login = false;

$user = $_POST["username"] ?? "";
$pass = $_POST["password"] ?? "";

if($username === $user && $password === $pass){
        $login = true;
        $_SESSION["login"] = $login;
        $_SESSION["username"] = $user;
        $_SESSION["error"] = "";
        header("Location: ./home.php");
        exit;
}
else{
    $login = false;
    $_SESSION["error"] = "error";
    header("Location: ../login.php");
    exit;
}

?>