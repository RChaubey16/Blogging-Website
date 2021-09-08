<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials/header.php') ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Home</title>
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

        $sql = $conn->prepare("SELECT * FROM blogsdata ORDER BY id DESC LIMIT 1");
        $sql->execute();
        $result = $sql->get_result();
        $ans = $result->fetch_assoc();

        if ($ans != null) { ?>

        <div class="home__bannerContent">
            <div class="home__bannerContent-title">
                <h1> <?php echo $ans['title']; ?> </h1>
            </div>
            <div class="home__bannerContent-desc">
                <?php 
                    $content = $ans['content'];
                    $stripped_content = strip_tags($content);
                ?>

                <p id = "content"><?php echo substr($stripped_content, 0, 72) . "...."; ?></p>

            </div>
            <div class="home__bannerContent-btn">
                <button> <a href="blogPage.php?id=<?php echo $ans['id']?>&user_id=<?php echo$ans['user_id']?>">Read More</a> </button>
            </div>
        </div>

    <?php } ?>

    <div class="home__blogCarousel">
        <h2 class = "home__blogCarouselHeading">
            <i class="fas fa-mail-bulk"></i>    
            RECENT BLOGS
        </h2>
        <div class="home__blogCarouselImages">
            
            <?php
                $sql = $conn->prepare("SELECT * FROM blogsdata ORDER BY id DESC LIMIT 5");
                $sql->execute();
                $result = $sql->get_result();
            ?>
            <?php foreach($result as $q) { ?>
                <div class = 'card search-card'>
                    <div class = "card-body">

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

                        <div class="blog-tile-img">
                            <img src="<?php echo $q['blog_image']?>" alt="">
                        </div>

                        <h3 class = 'heading'><?php echo $q['title'] ?></h3>

                        <div class="blog__details">
                            <p id='homePage__author'><i class="fas fa-user"></i> <?php echo $blog_user_name; ?></p>
                            <p id='homePage__author'><i class="far fa-clock"></i> 16 June, 2021</p>
                        </div>

                        <?php 
                            $content = $q['content'];
                            $stripped_content = strip_tags($content);
                        ?>

                        <p id = "content"><?php echo substr($stripped_content, 0, 72) . "...."; ?></p>

                        <div class = "read-more-btn">
                            <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                            <a href="search.php?searchBar=<?php echo $q['category'];?>" style = 'background-color: gray;'><?php echo $q['category'];?></a>
                        </div>

                    </div>
                                    
                </div>
            <?php } ?>
                        

        </div>
    </div>

    <div class="home__blogCardsBox">
        <?php  
            $sql = $conn->prepare("SELECT * FROM blogsdata ORDER BY id LIMIT 2");
            $sql->execute();
            $result = $sql->get_result();
        ?>
        <div class="home__blogCards">
            <?php foreach ($result as $r) { ?>
                <div class="home__blogCard1">
                    <a href="blogPage.php?id=<?php echo $r['id']; ?>&user_id=<?php echo $r['user_id']; ?>">
                        <img src="<?php echo $r['blog_image'] ?>" alt="">
                    </a>
                    <div class="home__blogCardDetails">
                        <button><?php echo $r['category']; ?></button>
                        <h3 class = 'heading'><?php echo $r['title'] ?></h3>
                        <div class="blog__details">
                            <?php 
                                // Query to access authorname of the blog
                                 $sql = $conn->prepare("SELECT userdetails.name FROM userdetails JOIN blogsdata WHERE (userdetails.user_id = blogsdata.user_id AND id = ?)");
                                 $sql->bind_param('i', $id);
                                 $id = $r['id'];
                                 $sql->execute();
                                 $result = $sql->get_result();
                                 $ans = $result->fetch_assoc();
                                 $blog_user_name = $ans['name'];
                            ?>
                            <p id='homePage__author'><i class="fas fa-user"></i> <?php echo $blog_user_name; ?></p>
                            <p id='homePage__author'><i class="far fa-clock"></i> 16 June, 2021</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="home__BannerTwo">
        <img src="https://jonnajintonsweden.com/wp-content/uploads/2020/09/morning-dimma3-4500x1873.jpg" alt="">
        <div class="home__BannerTwoDetails">
            <h3>"Blogging is not rocket science. It's about being yourself and putting what you have into it."</h3>
        </div>
    </div>


    
    <div class = "index__main">
        <div class="blog-list-box home__blogs"> 
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                
                        <div class = "card-body">

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

                            <div class="blog-tile-img">
                                <img src="<?php echo $q['blog_image']?>" alt="">
                            </div>

                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>

                            <div class="blog__details">
                                <p id='homePage__author'><i class="fas fa-user"></i> <?php echo $blog_user_name; ?></p>
                                <p id='homePage__author'><i class="far fa-clock"></i> 16 June, 2021</p>
                            </div>
                            
                            <?php 
                                $content = $q['content'];
                                $stripped_content = strip_tags($content);
                            ?>

                            <p id = "content"><?php echo substr($stripped_content, 0, 92) . "...."; ?></p>

                            <div class = "read-more-btn">
                                <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                                <a href="search.php?searchBar=<?php echo $q['category'];?>" style = 'background-color: gray;'><?php echo $q['category'];?></a>
                            </div>
                            
                        </div>
                    
                </div>
            <?php } ?>
        </div>

        <div class="index__bloggers hide-style quotes-container">

            <!-- ***************** Sidebar - Social Section ****************** -->
            <div class="social__container">
                <div class="social__title">
                    <h3 class="social__heading"> Social Plugin </h3>
                </div>
                <div class="social__content">
                    <ul class="social-counter social social-color">
                        <li class="facebook">
                            <a href="https://www.facebook.com/" target="_blank" title="facebook">
                                <i class="fab fa-2x fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="https://twitter.com/?lang=en" target="_blank" title="twitter">
                                <i class="fab fa-2x fa-twitter"></i>
                            </a>
                        </li>
                        <li class="linkedin">
                            <a href="https://www.linkedin.com/" target="_blank" title="linkedin">
                                <i class="fab fa-2x fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li class="reddit">
                            <a href="https://www.reddit.com/" target="_blank" title="reddit">
                                <i class="fab fa-2x fa-reddit"></i>
                            </a>
                        </li>
                        <li class="pinterest">
                            <a href="https://in.pinterest.com/" target="_blank" title="pinterest">
                                <i class="fab fa-2x fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li class="instagram">
                            <a href="https://www.instagram.com/" target="_blank" title="instagram">
                                <i class="fab fa-2x fa-instagram"></i>
                            </a>
                        </li>
                        <li class="youtube">
                            <a href="https://www.youtube.com/" target="_blank" title="youtube">
                                <i class="fab fa-2x fa-youtube"></i>
                            </a>
                        </li>
                        <li class="whatsapp">
                            <a href="https://www.whatsapp.com/" target="_blank" title="whatsapp">
                                <i class="fab fa-2x fa-whatsapp"></i>
                            </a>
                        </li>
                        <li class="github">
                            <a href="https://github.com/" target="_blank" title="github">
                                <i class="fab fa-2x fa-github"></i>
                            </a>
                        </li>       
                        <li class="slack">
                            <a href="https://slack.com/intl/en-in/" target="_blank" title="slack">
                                <i class="fab fa-2x fa-slack"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- ***************** Sidebar - Popular Posts ****************** -->

            <div class="popularPosts__container">
                <div class="popularPosts__title">
                    <h3 class="popularPosts__heading">
                            Popular Posts
                        </h3>
                    </div>
                <?php 
                    $sql = $conn->prepare("SELECT * from blogsdata ORDER BY id ASC LIMIT 3");
                    $sql->execute();
                    $result = $sql->get_result();
                
                    foreach($result as $r) {  ?>

                    <div class="popularPosts__content">
                        <div class="popularPosts__img">
                            <img src="<?php echo $r['blog_image']; ?>" alt="">
                        </div>
                        <div class="popularPosts__info">
                            <a href="http://localhost/BlogIt/blogPage.php?id=<?php echo $r['id']; ?>&user_id=<?php echo $r['user_id']; ?>">
                                <?php echo substr($r['content'], 0, 60) . "..."; ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- *************** SideBar - Category Section ****************** -->

            <div class="category__container">
                <div class="category__title">
                    <h3 class="category__heading">
                        Categories
                    </h3>
                </div>

                <?php 
                    $sql = $conn->prepare("SELECT category FROM blogsdata LIMIT 4");
                    $sql->execute();
                    $result = $sql->get_result();

                    foreach ($result as $a) { ?>

                    <a href="search.php?searchBar=<?php echo $a['category']; ?>&nav__searchBtn=">
                        <div class="category__content">
                            <div class="category__info">
                                > <?php echo $a['category']; ?>
                            </div>
                            <div class="category__count">
                                <?php 
                                    $sql = $conn->prepare("SELECT id FROM blogsdata where category = ?");
                                    $sql->bind_param("s", $category);
                                    $category = $a['category'];
                                    $sql->execute();
                                    $result = $sql->get_result();
                                    $count = mysqli_num_rows($result);
                                ?>
                                (<?php echo $count; ?>)
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>

        </div>
    </div>

    <!-- Subscribe Form -->

    <div class="home__subscribeBox">
        <div class="subscribe__details">
            <div class="sub__heading">
                <h2>Subscribe</h2>
            </div>
            <div class="sub__para">
               <p>Subscribe our newsletter to stay updated every moment</p>
            </div>
        </div>
        <div class="subscribe__form">
            <form method="POST">
                <input type="text" name="subscriber__email" placeholder="Just a step away, enter your email...">
                <button name = "subscriber__submit" class='submit__btn'>Submit</button>
            </form>
        </div>
    </div>

    <!-- Footer -->

    <div class="footer">
        <div class="details">

            <div class="location">
                <i class="fas fa-map-marker-alt"></i>
                <div class="location-details">

                    <p>Example Street.</p>
                </div>
            </div>
            <div class="phone">
                <i class="fas fa-phone"></i>
                <div class="location-details">

                    <p>+1 9999 9999</p>
                </div>
            </div>
            <div class="email">
                <i class="fas fa-envelope-square"></i>
                <div class="location-details">
                    <p>example@example.com</p>
                </div>
                
            </div>

        </div>

        <div class="links">
            
            <ul>
                <!-- <h3>Links</h3> -->
                <li>
                    <a href="home.php"> Home</a>
                </li>
                <li>
                     <a href="login.php"> Login</a>
                </li>
                <li>
                    <a href="register.php"> Register</a>
                </li>
            </ul>
        </div>

        <div class="about">
            <h3>About Us</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $(document).ready(function () {
                $('.home__blogCarouselImages').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true, 
                autoplaySpeed: 2000,
                responsive: [
                    {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                    }
                    },
                    {
                    breakpoint: 413,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    },
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
	    });
        
    </script>

<?php require_once('partials/footer.php') ?>
