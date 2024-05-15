<?php
session_start();
unset($_SESSION['ROLE']);
unset($_SESSION['LOGIN']);
header('location:../index.php');
die();
?>