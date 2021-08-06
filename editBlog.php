<?php 
    include "dbLogic.php";
?> 

<?php require_once('partials\header.php') ?>

    <title>Blog It | Edit</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials\navbar.php')?>

    <div class = 'create-post'>
        
        <?php foreach($query as $q) { ?>

            <form method="POST">
                <input type="text" hidden name = "id" value="<?php echo $q['id']?>">
                <input type="text" name="title" class="create-post-title" placeholder="Blog Title" value = "<?php echo $q['title'] ?>">
                <textarea name="content" cols="30" rows="10"><?php echo $q['content'] ?></textarea>
                <button name = "update" id='add-post-btn' style=>Update</button>
            </form>

        <?php } ?> 

    </div>
<?php require_once('partials\footer.php') ?>