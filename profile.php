<?php 
    include "dbLogic.php";
    session_start();
    include "translation.php";
    $lang = $_SESSION['lang'];

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }

    // edit user name (profile page)
    if (isset($_REQUEST['profile-submit-btn'])){
        $id = $_REQUEST['profile-user-id'];
        $name = $_REQUEST['uname'];
        $sql = "UPDATE userdetails SET name = '$name' where user_id = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: profile.php?updated");
        exit;
    }

?> 

<?php require_once('partials/header.php') ?>
<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Profile</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <h2 class = "profile__heading">Profile</h2>

    <?php 

        if (isset($_REQUEST['uid'])){
            $id = $_REQUEST['uid'];
            $sql = "SELECT * from userdetails where user_id = $id";
            $ans = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($ans);
            $name = $result['name'];
            $email = $result['email'];
            $bio = $result['bio'];
        
        } else {
            header("Location: index.php");
            exit;
        }
      
    ?>

    <div class="profile__box">

        <div class="profile__container">
            

            <div class="profile__avatar">
                <img src="https://image.flaticon.com/icons/png/512/3237/3237472.png" alt="">
                        
            </div>

            <form method = "POST">

                <label for="uname">Name</label>
                    <input type="text" name = 'uname' value = "<?php echo $name ?>" disabled>

                    <input name = "profile__user_id" type="text" value = "<?php echo $id?>" hidden>
                
                <!-- Bio -->
                <label for="profile__bio">Bio</label>
                    <?php if ($_SESSION['uid'] == $id) { ?>
                        <textarea class = "profile__bio" name="profile__bio" cols="30" rows="7" placeholder = "Tell us something about you..."><?php echo $bio; ?></textarea>
                    <?php } else { ?>
                        <textarea class = "profile__bio" cols="30" rows="7" placeholder = "Tell us something about you..." disabled><?php echo $bio; ?></textarea>
                    <?php } ?>

                

                <?php
                    $query = "SELECT id  FROM blogsdata WHERE user_id = $id";
                    $res = mysqli_query($conn, $query); 
                    $ans = mysqli_num_rows($res);

                ?>  

                <p>
                    Blogs: <?php echo $ans; ?>
                    <?php if ($_SESSION['uid'] == $id) { ?>
                        <button name = "profile__btn" id = "add-post-btn">Update</button>
                    <?php } ?>
                </p>
            
            </form>
        
        </div>

            <?php

                if (isset($_REQUEST['uid'])){
                    $id = $_REQUEST['uid'];
                    $sql = "SELECT * from blogsdata where user_id = $id";
                    $ans = mysqli_query($conn, $sql);

                } else {
                    header("Location: index.php");
                    exit;
                }

            
            ?>

            <div class="personal-blog-list">
                <?php if (mysqli_num_rows($ans) == 0) { ?>
                    <h1>No Blogs to show!</h1>
                <?php } ?>

                <?php foreach($ans as $a) { ?>
                    <div class = 'card'>
                    
                            <div class = "card-body">
                                <h3 class = 'heading'><?php echo $a['title'] ?></h3>
                                <div class="blog-tile-img">
                                    <img src="<?php echo $a['blog_image']?>" alt="">
                                </div>
                                <p id = "content" class = "personal__content"><?php echo substr($a['content'], 0, 202
                                ) . "...."; ?></p>
                                <div class = "read-more-btn profile-read-btn">
                                    <a href="blogPage.php?lang=<?php echo $lang; ?>&id=<?php echo $a['id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                                
                            </div>
                        
                    </div>
                <?php } ?>
            </div>
            

           
                    
    </div>




<?php require_once('partials/footer.php') ?>