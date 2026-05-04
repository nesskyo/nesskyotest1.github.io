<?php
include '../config.php';
mysqli_query($conn,"DELETE FROM kamar WHERE id_kamar='$_GET[id]'");
header("location:index.php");
?>