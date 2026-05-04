<?php
include '../config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];
    mysqli_query($conn, "DELETE FROM tamu WHERE id_tamu = $id");
}

header('Location: index.php');
exit;
?>
