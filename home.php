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


                        <p id = "content"><?php echo substr($q['content'], 0, 72) . "...."; ?></p>

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
            <p>
                <?php echo substr($ans['content'], 0, 90) . "..."; ?> 
            </p>
        </div>
        <div class="home__bannerContent-btn">
            <button> <a href="blogPage.php?id=<?php echo $ans['id']?>&user_id=<?php echo$ans['user_id']?>">Read More</a> </button>
        </div>
    </div>

    <?php } ?>

    
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
                            

                            <!-- <p id = "content"><?php echo substr($q['content'], 0, 92) . "...."; ?></p> -->

                            <div class = "read-more-btn">
                                <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                                <a href="search.php?searchBar=<?php echo $q['category'];?>" style = 'background-color: gray;'><?php echo $q['category'];?></a>
                            </div>
                            
                        </div>
                    
                </div>
            <?php } ?>
        </div>

        <div class="index__bloggers hide-style quotes-container">

            <h2 id = "index__bloggersHeading">Quotes</h2>

            <div class="blogger-container quote-box">
                
                <div class="blogger-avatar quote-bullet">
                    <i class="fas fa-3x fa-caret-right"></i>
                </div>
                <div class="blogger-details quote-details">

                    <p>The way to get started is to quit talking and begin doing. -<br><i style = "color: black;">Walt Disney</i></p>

                </div>
                    
            </div>

            <div class="blogger-container quote-box">
                
                <div class="blogger-avatar quote-bullet">
                    <i class="fas fa-3x fa-caret-right"></i>
                </div>
                <div class="blogger-details quote-details">

                    <p>The greatest glory in living lies not in never falling, but in rising every time we fall. -<i style = "color: black;">Nelson Mandela</i></p>

                </div>
                    
            </div>

            <div class="blogger-container quote-box">
                
                <div class="blogger-avatar quote-bullet">
                    <i class="fas fa-3x fa-caret-right"></i>
                </div>
                <div class="blogger-details quote-details">

                    <p>The future belongs to those who believe in the beauty of their dreams. -<i style = "color: black;">Eleanor Roosevelt</i></p>

                </div>
                    
            </div>

            <div class="blogger-container quote-box">
                
                <div class="blogger-avatar quote-bullet">
                    <i class="fas fa-3x fa-caret-right"></i>
                </div>
                <div class="blogger-details quote-details">

                    <p>Keep smiling, because life is a beautiful thing and there's so much to smile about. -<i style = "color: black;">Marilyn Monroe</i></p>

                </div>
                    
            </div>
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
