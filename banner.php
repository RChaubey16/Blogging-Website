<?php 
    include "dbLogic.php";
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }
?>

<?php require_once('partials/header.php') ?>
<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
<title>BlogIt | Slider</title>
</head>
<body>

    <?php include('partials/navbar.php') ?>
    <?php include('partials/menuLinks.php') ?>


    <?php if (isset($_REQUEST['info'])){ ?>

         
        <?php if ($_REQUEST['info'] === 'halt') { ?>
        <div class="alert error-dailog" id="alert">
                    Minimum order reached!
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
        
        <?php } ?>



    <?php } ?>


    <div class="carousel-container">
        <div class="carousel-slide">

            <?php 
                $sql = "SELECT * FROM images ORDER BY image_order ASC";
                $res = mysqli_query($conn, $sql); 


                if (mysqli_num_rows($res) > 0){
                    while ($images = mysqli_fetch_assoc($res)) { ?>

                        <!-- Delete banner image button -->
                        <form action = "deleteBanner.php" class="home__deleteForm" method = "POST">

                            <input type="text" hidden name = "img_id" value = "<?php echo $images['id']; ?>">

                            <input type="text" hidden name = "img_order" value = "<?php echo $images['image_order']; ?>">
                            

                            <button name = "delete_btn">
                                <i class="fas fa-2x fa-times-circle"
                                name = "icon"></i>
                            </button>

                            <button class = 'left' name = "left-shift">
                                <i class="fas fa-2x fa-angle-double-left"></i>
                            </button>

                            <button class = 'right' name = "right-shift">
                                <i class="fas fa-2x fa-angle-double-right"></i>
                            </button>

                            <p class = 'banner__image-order'>
                                <?php echo $images['image_order']?>
                            </p>
                                
                
                            
                        </form>

                        <!-- Banner Image -->
                        <img src="uploads/<?=$images['image']?>" alt="" id = "<?php echo $images['id']?>"> 

                           
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
        <div class="field">
            <input type="file" name ="img-input" id = "image" required>
        </div>
        <div class="field">
            
            <input type="text" name = "img_order" placeholder = "Order number" required>
        </div>
        <button name="new_img" id = "add-post-btn">Send</button>    
        <!-- <a href="deleteBanner.php" id = 'delete-post-btn'><i class="fas fa-trash-alt"></i></a>  -->
    </form>


<script src = "static/js/carousel.js"></script>
<?php require_once("partials/footer.php") ?>

