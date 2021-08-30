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
    <title>BlogIt</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class="home__imgContainer">
        <div class="home__imageDark"></div>
        <img src="https://1.bp.blogspot.com/-0FL-YgfsMOU/YL76dPlRYBI/AAAAAAAAK28/Ta4Y4TE2keYiGX_T2jHlT2rWGZL1A3noQCNcBGAsYHQ/s16000/mountain2.jpg" alt="">
    </div>

    <?php 

        $sql = $conn->prepare("SELECT * FROM blogsdata ORDER BY id ASC LIMIT 1");
        $sql->execute();
        $result = $sql->get_result();
        $ans = $result->fetch_assoc();

        if ($ans != null) { ?>

    <div class="home__bannerContent">
        <div class="home__bannerContent-title">
            <h1> <?php echo $ans['title']; ?> </h1>
        </div>
        <div class="home__bannerContent-desc">
            <p>
                <?php echo substr($ans['content'], 0, 90) . "..."; ?> 
            </p>
        </div>
        <div class="home__bannerContent-btn">
            <button> <a href="blogPage.php?id=<?php echo $ans['id']?>&user_id=<?php echo$ans['user_id']?>">Read More</a> </button>
        </div>
    </div>

    <?php } ?>


    <div class = "index__container">

        <div class="index__btns">

            <?php if ($_SESSION['loggedin'] == true) { ?>
                <div id="create-blog-button">
                    <a href="createPost.php">+ Create a new Blog</a>
                </div>

                <div id="create-blog-button">
                    <a href="banner.php"><i class="fas fa-sliders-h"></i> Slider</a>
                </div>
            <?php } ?>


        </div>
        
        <hr>

        <?php if (isset($_REQUEST['info'])){ ?>

            <?php if($_REQUEST['info'] == 'added') { ?>
                <div class="alert success-dailog" id="alert">
                    Post has been published Successfully!
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
            <?php } elseif ($_REQUEST['info'] == 'deleted') { ?>
                <div class="alert success-dailog" id="alert">
                    Post has been deleted Successfully!
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>    
            <?php } elseif ($_REQUEST['info'] == 'updated') { ?>
                <div class="alert success-dailog" id="alert">
                    Post has been updated Successfully!
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
            <?php } elseif ($_REQUEST['info'] == 'login') { ?>
                <div class="alert success-dailog" id="alert">
                    Login successful, Welcome <?php echo $_SESSION['username'] ?>!
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
            <?php } ?>

        <?php } ?>

     


        <div class = "index__main">

            <div class="blog-list-box">
                 
                <?php foreach($query as $q) { ?>
                    <div class = 'card'>
                        <div>
                            <div class = "card-body">
                                <h3 class = 'heading'><?php echo $q['title'] ?></h3>

                                <?php 
                                // Query to access authorname of the blog
                                 $sql = $conn->prepare("SELECT userdetails.name FROM userdetails JOIN blogsdata WHERE (userdetails.user_id = blogsdata.user_id AND id = ?)");
                                 $sql->bind_param('i', $id);
                                 $id = $q['id'];
                                 $sql->execute();
                                 $result = $sql->get_result();
                                 $ans = $result->fetch_assoc();
                                 $blog_user_name = $ans['name'];
                                ?>

                                <p id='homePage__author'>- <?php echo $blog_user_name; ?></p>

                                <div class="blog-tile-img">
                                    
                                    <img src="<?php echo $q['blog_image']?>" alt="">
                                </div>
                                <p id = "content"><?php echo substr($q['content'], 0, 92
                                ) . "...."; ?></p>
                                <div class = "read-more-btn">
                                    <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

             </div>

             <div class="index__bloggers hide-style">

                    <h2 id = "index__bloggersHeading">Bloggers</h2>

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
                                        <input type="text" name = "uname" value="<?php echo $a['name'] ?>" hidden>
                                        <input type="text" name = "uemail" value="<?php echo $a['email'] ?>" hidden>

                                    
                                    </div>

                                </a>
                <?php } } ?>

             </div>


        </div>

        


    </div>
    

<?php require_once('partials/footer.php') ?>