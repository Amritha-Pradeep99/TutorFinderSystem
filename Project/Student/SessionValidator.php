<?php
session_start();
if(!(isset($_SESSION['studentid']) && !empty($_SESSION['studentid']))) {
    header("location:../index.php");
}
?>