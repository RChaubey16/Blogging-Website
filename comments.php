<?php
    include "dbLogic.php";

    if (isset($_REQUEST['comment-btn'])){
        $content = $_POST['comment-box'];
        $userId = $_POST['user-id'];
        $blogId = $_POST['blog-id'];

        $q = "INSERT INTO comments(comment, uid, bid) VALUES('$content', $userId, $blogId)";
        mysqli_query($conn, $q);

        header("Location: blogPage.php?id=$blogId&user_id=$userId");
        exit;
    }



?>