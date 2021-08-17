<?php
    include "dbLogic.php";

    $sql = "DELETE FROM images ORDER BY id DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    header("Location: index.php");
    exit;

?>