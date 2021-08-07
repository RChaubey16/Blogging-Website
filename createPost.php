<?php include "dbLogic.php"; 
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }

?> 
<?php require_once('partials\header.php') ?>
    <title>BlogIt | Create</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials\navbar.php')?>

    <div class = 'create-post'>
        <form method="POST">
            <input type="text" name="title" class='create-post-title' placeholder="Blog Title" required>
            <textarea name="content" cols="30" rows="40" placeholder="Write your blog here...." required></textarea>
            <input type='text' hidden name = "userId" value = "<?php echo $_SESSION['uid']; ?>">
            <button name = "new_post" id='add-post-btn'>Add Post</button>
        </form>
    </div>

<?php require_once('partials\footer.php') ?>