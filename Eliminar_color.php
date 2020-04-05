<?php
require "config/conexion.php";
if (isset($_GET['idColor'])) {
    $idColor = $_GET['idColor'];
    mysqli_query($db, "DELETE FROM Color WHERE idColor=$idColor");
    $_SESSION['message'] = "Address deleted!";
    header('location: Color.php');
}
