<?php
    include "dbLogic.php";

    if (isset($_REQUEST['comment-btn'])){

        // mysql prepared statements
        $sql = $conn->prepare("INSERT INTO comments(comment, uid, bid, likes) VALUES(?, ?, ?, ?)");
        $sql->bind_param("siii", $content, $userId, $blogId, $likes);

        $content = $_POST['comment-box'];
        $userId = $_POST['user-id'];
        $blogId = $_POST['blog-id'];
        $likes = 0;

        $sql->execute();

        header("Location: blogPage.php?id=$blogId&user_id=$userId?ADD");
        exit;
    }

    if (isset($_GET['type'])){
        $type = $_GET['type'];
        if ($type == "comment"){
            $sql = $conn->prepare("SELECT likes FROM comments WHERE id = ?");
            $sqlInsert = $conn->prepare("UPDATE comments SET likes = ? WHERE id = ?");
            $sql->bind_param("i", $id);
            $sqlInsert->bind_param("ii", $like_count, $id);
            $id = $_GET['id'];
            $sql->execute();
            $result = $sql->get_result();
            $ans = $result->fetch_assoc();
            $like_count = $ans['likes'];
            $like_count = $like_count + 1;
            $sqlInsert->execute();

            // Redirects back to prev page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;         

        }
    }
?>