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
    <?php include('partials\menuLinks.php')?>

    <div class="home__banner">
        <img src="https://images.unsplash.com/photo-1511649475669-e288648b2339?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80" alt="">
        <div class="fade">
        
        </div>
    </div>
    

    <div>
        <div class="blog-list-box">
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                
                        <div class = "card-body">
                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>
                            <!-- <p id = "content"><?php echo $q['content'] ?></p> -->
                            <div class = "read-more-btn">
                                <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More !</a>
                            </div>
                            
                        </div>
                    
                </div>
            <?php } ?>
        </div>
    </div>
    
<?php require_once('partials\footer.php') ?>
