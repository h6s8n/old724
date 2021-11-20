<?php
session_start();

include "functions.php";
activitylog(5,$_SERVER['REQUEST_URI']);

session_destroy();
setcookie("shn", "", time()-60*60*24*365, "/");

header("location: login.php");
?>