<?php include "dbLogic.php"; 
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }

?> 
<?php require_once('partials/header.php') ?>
    <title>BlogIt | Create</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class = 'create-post'>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" class='create-post-title' placeholder="Blog Title" autocomplete = "off" required>
            <input type="file" name="blog__img">
            <textarea name="content" cols="30" rows="40" placeholder="Write your blog here...." required></textarea>
            <input type='text' hidden name = "userId" value = "<?php echo $_SESSION['uid']; ?>">
            <button name = "new_post" id='add-post-btn'>Add Post</button>
        </form>
    </div>

<?php require_once('partials/footer.php') ?>

<!-- <input type="file" name="profile_img" class="input my-3" value="<?php echo $_POST['profile_img']; ?>"> -->