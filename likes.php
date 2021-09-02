<?php

    include "dbLogic.php";
    session_start();

    if (isset($_POST['action'])){
        $post_id = $_POST['post_id'];
        $action = $_POST['action'];
        $user_id = $SESSION['id'];

        switch ($action) {
            case 'like':
                $sql = "INSERT INTO blog_likes (user, blog, rating_action) VALUES ($user_id, $post_id, 'like')
                ON DUPLICATE KEY UPDATE rating_action = 'like'";
                break;
            case 'dislike':
                $sql = "INSERT INTO blog_likes (user, blog, rating_action) VALUES ($user_id, $post_id, 'dislike')
                ON DUPLICATE KEY UPDATE rating_action = 'dislike'";
                break;
            case 'unlike':
                $sql =  "DELETE FROM blog_likes WHERE user = $user_id AND blog = $post_id";
                break;
            case 'undislike':
                $sql =  "DELETE FROM blog_likes WHERE user = $user_id AND blog = $post_id";
                break;
            default:
                break;

        }

        // execute query to effect changes in the database
        mysqli_query($conn, $sql);
        echo getRating($post_id);
        exit(0);
    }

    // if user has already liked the post or not
    function userLiked($id){
        global $conn;
        $user_id = $_SESSION['uid'];

        $sql = "SELECT * from blog_likes WHERE user = $user_id AND blog = $id AND rating_action = 'like'";
        $result = mysqli_query($conn, $sql);
        $ans = mysqli_num_rows($result);

        if ($ans > 0){
            return true;
        } else {
            return false;
        }
    }

    // like count of a post
    function getLikes($id){
        global $conn;
        $sql = "SELECT COUNT(*) FROM blog_likes WHERE blog = $id AND rating_action = 'like'";
        $rs = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($rs);

        return $result[0];
    }

    // if user has already liked the post or not
    function userDisliked($id){
        global $conn;
        $user_id = $_SESSION['uid'];

        $sql = "SELECT * from blog_likes WHERE user = $user_id AND blog = $id AND rating_action = 'dislike'";
        $result = mysqli_query($conn, $sql);
        $ans = mysqli_num_rows($result);

        if ($ans > 0){
            return true;
        } else {
            return false;
        }
    }

    // like count of a post
    function getDislikes($id){
        global $conn;
        $sql = "SELECT COUNT(*) FROM blog_likes WHERE blog = $id AND rating_action = 'dislike'";
        $rs = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($rs);


        return $result[0];
    }

    function getRating($id){
        global $conn;
        $rating = array();
        $likes_query = "SELECT COUNT(*) FROM blog_likes WHERE blog = $id AND rating_action = 'like'";
        $dislikes_query = "SELECT COUNT(*) FROM blog_likes WHERE blog = $id AND rating_action = 'dislike'";
        $likes_rs = mysqli_query($conn, $likes_query);
        $likes_rs = mysqli_query($conn, $dislikes_query);
        $likes = mysqli_fetch_array($likes_rs);
        $dislikes = mysqli_fetch_array($dislikes_rs);
        $rating = [
            'likes' => $likes[0],
            'dislikes' => $dislikes[0]
        ];
        return json_encode($rating);
    }

?>