<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials/header.php') ?>
    <link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Search</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class="search__mainContainer">

        <?php 

            if (isset($_GET['searchBar'])) {

                $category = $_GET["searchBar"];
                $search = '%'.$category.'%';
                $sql = "SELECT * FROM blogsdata JOIN userdetails ON (blogsdata.user_id = userdetails.user_id) WHERE category LIKE '".$search."' OR soundex(category) = soundex('$search') OR content LIKE'".$search."' OR title LIKE '".$search."' OR name LIKE '".$search."'";
                $result = mysqli_query($conn, $sql);
            }
        ?>

        <?php if (mysqli_num_rows($result) == 0) { ?>

            <h2 class = "search__heading">No Blogs related to: <span style = "color: #0488d1;"><?php echo $category; ?></span></h2>

            <div class="search__noDataFound">
                <img src="https://image.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg" alt="">
            </div>

        <?php } else { ?>

            <h2 class = "search__heading">Showing Blogs related to: <span style = "color: #0488d1;"><?php echo $category; ?></span></h2>

            <div class = "index__main">
                <div class="blog-list-box home__blogs"> 
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

                                    <p id = "content"><?php echo substr($q['content'], 0, 92
                                        ) . "...."; ?></p>

                                    <div class = "read-more-btn">
                                        <a href="blogPage/<?php echo $q['id']?>/<?php echo$q['user_id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                                        <a href="search/<?php echo $q['category'];?>" style = 'background-color: gray;'><?php echo $q['category'];?></a>
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
                                <a href="http://localhost/BlogIt/blogPage/<?php echo $r['id']; ?>/<?php echo $r['user_id']; ?>">
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

                        <a href="search/<?php echo $a['category']; ?>">
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

            </div>
        <?php } ?>
    </div>

<?php require_once('partials/footer.php') ?>
