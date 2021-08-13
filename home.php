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
            <img src="https://images.pexels.com/photos/3747075/pexels-photo-3747075.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="">
            <img src="static\images\carousel3.jpg" alt="">
            <img src="https://wallpaperaccess.com/full/521111.jpg" alt="">
            <img src="static\images\carousel4.jpg" alt="">
            <img src="https://images.pexels.com/photos/3747075/pexels-photo-3747075.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" id = "firstClone" alt="">
         
        </div>
    </div>

    <div class="carousel-btns">
        <button id = "prevBtn"><i class="fas fa-3x fa-arrow-alt-circle-left"></i></button>
        <button id = "nextBtn"><i class="fas fa-3x fa-arrow-alt-circle-right"></i></button>
    </div>

    <!-- <div class="home__banner">
        <img src="https://wallpaperaccess.com/full/521111.jpg" alt="">
        
    </div> -->

    <div class="fade">
        
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
    
<script src = "static\js\carousel.js"></script>
<?php require_once('partials\footer.php') ?>
