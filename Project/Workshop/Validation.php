<?php
session_start();
if(!(isset($_SESSION['workshop']) && !empty($_SESSION['workshop']))) {
    header("location:../index.php");
}
?>