<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials/header.php') ?>
    <title>BlogIt | Home</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class="carousel-container">
        <div class="carousel-slide">

            <!-- Using GD library functions -->



            <?php
   
                    $file = "uploads/IMG-611a2e459bb001.67294963.jpg";
                    list($width, $height) = getimagesize($file);
                    // echo $width;
                    $new_width = 1200;
                    $new_height = 860;
                    // below function will create a black image of the mentioned dimensions
                    $newimage = imagecreatetruecolor($new_width, $new_height);
                    $source = imagecreatefromjpeg($file);
                    // in below function, first 2 zeros represent the x and y-axis of new image and the next two zeros represent the x and y-axis of source
                    imagecopyresized($newimage, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    $filename = 'new_img.jpg';
                    imagejpeg($newimage, 'uploads/'.$filename);

            ?>
           
            <picture>
                <source media="(max-width: 465px)" srcset="uploads/IMG-611a2f856ddf68.71025663.jpg">
                <source media="(max-width: 650px)" srcset="uploads/new_img.jpg">
                <img src="uploads/IMG-611a2e459bb001.67294963.jpg">
            </picture>


            
        </div>
    </div>
    
    <div>
        <div class="blog-list-box">
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                
                        <div class = "card-body">
                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>
                            <div class = "read-more-btn">
                                <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>
                            
                        </div>
                    
                </div>
            <?php } ?>
        </div>
    </div>
    

<?php require_once('partials/footer.php') ?>
