<?php
session_start();
unset($_SESSION['sess_user']);
session_destroy();
header("Location: http://localhost:81/tesead/login.php");
?>