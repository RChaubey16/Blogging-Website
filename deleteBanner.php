<?php
    include "dbLogic.php";

    if (isset($_POST['delete_btn'])){
        $id = $_POST['img_id'];
        $sql = "DELETE FROM images where id = $id";
        $res = mysqli_query($conn, $sql);
        header("Location: index.php?del");
        exit;
    }
    

?>