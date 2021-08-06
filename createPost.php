<?php include "dbLogic.php"; ?> 
<?php require_once('partials\header.php') ?>
    <title>BlogIt | Create</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials\navbar.php')?>

    <div class = 'create-post'>
        <form method="POST">
            <input type="text" name="title" class='create-post-title' placeholder="Blog Title">
            <textarea name="content" cols="30" rows="40" placeholder="Write your blog here...."></textarea>
            <button name = "new_post" id='add-post-btn'>Add Post</button>
        </form>
    </div>

<?php require_once('partials\header.php') ?>