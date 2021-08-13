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

    <div class="carousel-container">
        <div class="carousel-slide">
        <img src="static\images\carousel4.jpg" id = "lastClone" alt="" >
            <img src="static\images\carousel1.jpg" alt="">
            <img src="static\images\carousel3.jpg" alt="">
            <img src="static\images\carousel4.jpg" alt="">
            <img src="static\images\carousel1.jpg" id = "firstClone" alt="">
         
        </div>
    </div>

    <button id = "prevBtn">prev</button>
    <button id = "nextBtn">next</button>



    <!-- <div class="home__banner">
        <img src="https://wallpaperaccess.com/full/521111.jpg" alt="">
        
    </div> -->

    <!-- <div class="fade">
        
    </div>
     -->

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
