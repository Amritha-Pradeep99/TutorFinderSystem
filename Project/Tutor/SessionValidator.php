<?php
session_start();
if(!(isset($_SESSION['tutorid']) && !empty($_SESSION['tutorid']))) {
    header("location:../index.php");
}
?>