<?php
    include "dbLogic.php";

    if (isset($_POST['delete_btn'])){
        $id = $_POST['img_id'];
        $sql = "DELETE FROM images where id = $id";
        $res = mysqli_query($conn, $sql);
        header("Location: index.php?del");
        exit;
    }

    // move banner to left
    if (isset($_POST['left-shift'])){
        $id = $_POST['img_id'];
        $img_order = $_POST['img_order'];
        $img_order = $img_order - 1;
        if ($img_order != 0){
            $sql = "UPDATE images SET image_order = '$img_order' where id = '$id'";
            $ans = mysqli_query($conn, $sql);
            header("Location: banner.php?info=decreased");
            exit;
        }
    
        header("Location: banner.php?info=halt");
    }

    // move banner to right
    if (isset($_POST['right-shift'])){
        $id = $_POST['img_id'];
        $img_order = $_POST['img_order'];
        $img_order = $img_order + 1;
        if ($img_order != 0){
            $sql = "UPDATE images SET image_order = '$img_order' where id = '$id'";
            $ans = mysqli_query($conn, $sql);
            header("Location: banner.php?info=increased");
            exit;
        }
    
        header("Location: banner.php?info=halt");
    }
    
    

?>