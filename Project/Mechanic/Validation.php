<?php
session_start();
if(!(isset($_SESSION['mechanic']) && !empty($_SESSION['mechanic']))) {
    header("location:../index.php");
}
?>