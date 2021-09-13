<?php
    include "dbLogic.php";

    if (isset($_POST['delete_btn'])){

        $sql = $conn->prepare("SELECT image FROM images WHERE id = ?");
        $sql->bind_param("i", $id);
        $sqlDel = $conn->prepare("DELETE FROM images where id = ?");
        $sqlDel->bind_param("i", $id);

        $id = $_POST['img_id'];
        $sql->execute();
        $result = $sql->get_result();
        $ans = $result->fetch_assoc();
        $filename = $ans['image'];
        if (isset($filename)){
            // deletes the image from /uploads as well
            unlink($filename);
        }
        $sqlDel->execute();

        // $sql = "DELETE FROM images where id = $id";
        // $res = mysqli_query($conn, $sql);
        
        header("Location: banner.php?del");
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