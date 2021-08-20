<?php 
    include "dbLogic.php";
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }
?> 

<?php require_once('partials/header.php') ?>

    <title>BlogIt</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class="index__bloggers">


        <h2>Bloggers</h2>

        <?php 
            $sql = "SELECT * FROM userdetails ORDER By user_id DESC";
            $res = mysqli_query($conn, $sql);
                        
                foreach($res as $a) {  
                            
                    if ($_SESSION['username'] == $a['name']){
                        continue;
                    } else { ?>

                        
                        <a href="profile.php?uid=<?php echo $a['user_id']?>">


                            <div class="blogger-container">
                                <div class="blogger-avatar">
                                    <img src="https://image.flaticon.com/icons/png/512/1077/1077012.png" alt="">
                                    <!-- <i class="fas fa-3x fa-user"></i> -->
                                </div>
                                <div class="blogger-details">

                                    <p><?php echo $a['name']?></p>

                                </div>
                            </div>

                        </a>
        <?php } } ?>

    </div>



<?php require_once('partials/footer.php') ?>