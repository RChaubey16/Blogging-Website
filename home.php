<?php 
    include "dbLogic.php";
    session_start();

?> 
<?php require_once('partials\header.php') ?>

    <title>BlogIt</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>

    <div>

        <!-- <?php if (isset($_REQUEST['info'])){ ?>

            <?php if($_REQUEST['info'] == 'added') { ?>
                <div role="alert">
                        Post has been published Successfully!
                    </div>
           <?php } ?> 

        <?php } ?>  -->

        

        <div class="blog-list-box">
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                    <div>
                        <div class = "card-body">
                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>
                            <!-- <p id = "content"><?php echo $q['content'] ?></p> -->
                            <div class = "read-more-btn">
                                <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More !</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
<?php require_once('partials\footer.php') ?>
