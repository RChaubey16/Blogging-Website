<?php 

    require 'config.php';
    
    // establishing a connection to the database 
    $conn = mysqli_connect($database['host'], $database['username'], $database['password'], $database['database']);

    // Checking if the connection is established or not
    if (!$conn){
        echo "<h3>Not able to establish Database connection</h3>"; 
    }

    // fetching all the blogs from database
    $sql = "SELECT * FROM blogsdata ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);

    // inserting the new blog into database
    if (isset($_REQUEST['new_post'])){
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];
        $userId = $_REQUEST['userId'];
        $userName = $_REQUEST['user_name'];


        $sql_query = "INSERT INTO blogsdata(title, content, user_id) VALUES('$title', '$content', $userId)";
        mysqli_query($conn, $sql_query);

        // redirecting to the home page
        header("Location: index.php?info=added");
        exit();
    }

     // edit page query
     if (isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM blogsdata WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }

    // update the blog query
    if (isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];

        $sql = "UPDATE blogsdata SET title = '$title', content = '$content'
         WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php?info=updated");
        exit();
    }

    // Delete the blog query
    if (isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM blogsdata WHERE id = $id";
        $query = mysqli_query($conn, $sql);

        header("Location: index.php?info=deleted");
        exit();
    }


    // Registration query
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_REQUEST['new_user'])){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['password'];
        $con_pwd = $_REQUEST['confirmPassword'];

        /* Checking if user already exists */
        $query = "SELECT email from userdetails where email = '$email'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if ($num >= 1){
            header("Location: register.php?info=present");
            exit();
        }

        /* If user does not exists then register the user */
        if ($pwd === $con_pwd){
            $sql_query = "INSERT INTO userdetails(name, email, password, date) VALUES('$name', '$email', '$pwd', current_timestamp())";
            mysqli_query($conn, $sql_query);
            header("Location: login.php?info=registered");
            exit();
        } else {
            header("Location: register.php?info=error");
            exit();
        }
    }

   
?>
