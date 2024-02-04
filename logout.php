<?php
session_start();
unset($_SESSION['ROLE']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['DEPARTMENT_ID']);
unset($_SESSION['IMAGE']);


header('location:login.php');
die();
?>