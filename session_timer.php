<?php
session_start();
if(isset($_SESSION['sess_time']) && $_SESSION['sess_time'] > 1800) {
  header("Location: logout.php");
} else {
  $_SESSION['sess_user'] = time();
}
?>
