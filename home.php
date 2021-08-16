<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials\header.php') ?>

    <title>BlogIt | Home</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>
    <?php include('partials\menuLinks.php')?>

    


    <div class="carousel-container">
        <div class="carousel-slide">

            <?php 
                $sql = "SELECT * FROM images ORDER BY id DESC";
                $res = mysqli_query($conn, $sql);   

                if (mysqli_num_rows($res) > 0){
                    while ($images = mysqli_fetch_assoc($res)) { ?>

                
                    <img src="uploads/<?=$images['image']?>" alt="">    

           <?php } } ?>
                
        </div>
    </div>

    
    <div class="carousel-btns">
        <button id = "prevBtn"><i class="fas fa-3x fa-arrow-alt-circle-left"></i></button>
        <button id = "nextBtn"><i class="fas fa-3x fa-arrow-alt-circle-right"></i></button>
    </div>

    <div class="fade">
        
    </div>

    
    <form action="upload.php" method="POST" enctype='multipart/form-data' class = "home__imgUploadForm">
        <h3>Create your own image Slider!</h3>
        <br>
        <input type="file" name ="img-input" id = "image" required>
        <button name="new_img" id = "add-post-btn">Send</button>
        </button>
    </form>
    

    <div>
        <div class="blog-list-box">
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                
                        <div class = "card-body">
                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>
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
