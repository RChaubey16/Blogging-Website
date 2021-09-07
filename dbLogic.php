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

        $blog_image = $_FILES['blog__img'];

        $filename = $blog_image['name'];
        $filename_tmp = $blog_image['tmp_name'];

        $profile_ext = explode('.', $filename);
        $filecheck = strtolower(end($profile_ext));

        $file_ext_stored = array('jpeg', 'png', 'jpg');

        if (in_array($filecheck, $file_ext_stored)){
            
            $destinationFile = "uploads/" . $filename;
            move_uploaded_file($filename_tmp, $destinationFile);
        }


        $title = $_REQUEST['title'];
        $content = $_REQUEST['editor1'];
        $category = $_REQUEST['blog__topic'];
        $userId = $_REQUEST['userId'];
        $userName = $_REQUEST['user_name'];

        $sql_query = "INSERT INTO blogsdata(title, content, user_id, blog_image, category) VALUES('$title', '$content', $userId, '$destinationFile', '$category')";
        mysqli_query($conn, $sql_query);

        // redirecting to the home page
        header("Location: index.php?info=added&dest=$filename");
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

        // using mysql prepared
        $sql = $conn->prepare("UPDATE blogsdata SET title = ?, content = ?
        WHERE id = ?");
        $sql->bind_param("ssi", $title, $content, $id);

        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['editor1'];
        $sql->execute();

        // Normal SQL query
        // $sql = "UPDATE blogsdata SET title = '$title', content = '$content'
        //  WHERE id = $id";
        // mysqli_query($conn, $sql);

        header("Location: index.php?info=updated");
        exit();
    }

    // Delete the blog query
    if (isset($_REQUEST['delete'])){

        $sql = $conn->prepare("SELECT blog_image from blogsdata WHERE id = ?");
        $sql->bind_param("i", $id);
        $id = $_REQUEST['id'];
        $sql->execute();
        $result = $sql->get_result();
        $ans = $result->fetch_assoc();
        $filename = $ans['blog_image'];
        if (isset($filename)){
            // deletes the image from /uploads as well
            unlink($filename);
        }

        $sqlDelete = $conn->prepare("DELETE FROM blogsdata WHERE id = ?");
        $sqlDelete->bind_param("i", $id);
        $sqlDelete->execute();
        // $sql = "DELETE FROM blogsdata WHERE id = $id";
        // $query = mysqli_query($conn, $sql);

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

            $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
            $bio = '';

            $sql_query = "INSERT INTO userdetails(name, email, password, bio, date) VALUES('$name', '$email', '$hashed_password', '$bio', current_timestamp())";
            mysqli_query($conn, $sql_query);
            header("Location: login.php?info=registered");
            exit();
        } else {
            header("Location: register.php?info=error");
            exit();
        }
    }


    // Updating profile bio 
    if (isset($_POST['profile__btn'])){

        // Using Mysql prepared statement
        $sql = $conn->prepare("UPDATE userdetails SET bio = ? WHERE user_id = ?");
        $sql->bind_param("si", $bio, $profile_id);
        $bio = $_POST['profile__bio'];
        $profile_id = $_POST['profile__user_id'];
        $sql->execute();

        // Normal SQL Queries
        // $sql = "UPDATE userdetails SET bio = '$bio' WHERE user_id = $profile_id";
        // mysqli_query($conn, $sql);
        
        header("Location: profile.php?uid=$profile_id");
        exit;
    }

    
   
?>
