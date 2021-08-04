<?php 
    include "dbLogic.php";
?> 
<?php require_once('partials\header.php') ?>

    <title>BlogIt</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>

    <div>

        <?php if (isset($_REQUEST['info'])){ ?>

           <!-- <?php if($_REQUEST['info'] == 'added') { ?>
                <div role="alert">
                        Post has been published Successfully!
                    </div>
           <?php } ?> -->

        <?php } ?>

        <div id="create-blog-button">
            <a href="createPost.php">+ Create a new Blog</a>
        </div>

        <hr>

        <div class="blog-list-box">
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                    <div>
                        <div class = "card-body">
                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>
                            <!-- <p id = "content"><?php echo $q['content'] ?></p> -->
                            <div class = "read-more-btn">
                                <a href="">Read More <span>&rarr;</span></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>