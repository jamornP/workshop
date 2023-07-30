<?php
session_start();

$_SESSION=[];

header("location: /workshop/pages/auth/login.php");

?>