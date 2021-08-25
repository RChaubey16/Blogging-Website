
<?php 

    include "dbLogic.php";
    session_start();

    if (isset($_GET['type'], $_GET['id'], $_GET['user_id'])){
        $type = $_GET['type'];
        $id = $_GET['id'];
        $userId = $_GET['user_id'];
        $loggedInUser = $_SESSION['uid'];

        // $query = "SELECT id FROM blog_likes WHERE (user = $loggedInUser AND blog = $id)";
        // $result = mysqli_num_rows(mysqli_query($conn, $query));
        
        
        if ($type == "article"){
            $sql = "INSERT INTO blog_likes(user, blog)
                        SELECT {$_SESSION['uid']}, {$id}
                        FROM blogsdata
                        WHERE EXISTS (
                            SELECT id FROM blogsdata WHERE id = {$id})
                        AND NOT EXISTS (
                            SELECT id FROM blog_likes 
                            WHERE user = {$_SESSION['uid']}
                            AND blog = {$id})
                        LIMIT 1 ";
            mysqli_query($conn, $sql);
                    
                    
            // $_SESSION['uid'] will be stored in user column and
            // $id is the blog-id which will be stored in blog column
        }

        header("Location: blogPage.php?id=$id&user_id=$userId");
    }


?>