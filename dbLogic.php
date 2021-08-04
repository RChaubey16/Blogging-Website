<?php 
    
    // establishing a connection to the database 
    $conn = mysqli_connect("localhost", "root", "", "blogsite");

    // Checking if the connection is established or not
    if (!$conn){
        echo "<h3>Not able to establish Database connection</h3>"; 
    }

    // fetching all the blogs from database
    $sql = "SELECT * FROM blogsdata";
    $query = mysqli_query($conn, $sql);

    // inserting the new blog into database
    if (isset($_REQUEST['new_post'])){
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];

        $sql_query = "INSERT INTO blogsdata(title, content) VALUES('$title', '$content')";
        mysqli_query($conn, $sql_query);

        // redirecting to the home page
        header("Location: index.php?info=added");
        exit();
    }

?>