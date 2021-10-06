<?php 
    include "dbLogic.php";
    include "likes.php";
    session_start();

    $lang = $_GET['lang'];
?> 
<?php require_once('partials/header.php') ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
<script src="static/js/like.js"></script>

<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Blog</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>
    
    <div class="blogPage__container">

        <div class = "blog-container">
            <?php foreach($query as $q) { ?>    
                <div class="">
                    <?php if (isset($lang) and ($lang == "hi")) { ?>
                        <h1 id = "heading"><?php echo $q['blog_title_hindi']; ?></h1>
                    <?php } else { ?>
                        <h1 id = "heading"><?php echo $q['title']; ?></h1>
                    <?php } ?>
                </div>

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

                <div class="blogPage__details">
                    <p id='homePage__author'><i class="fas fa-user"></i> <?php echo $blog_user_name; ?></p>
                    <p id='homePage__author'><i class="far fa-clock"></i> 16 June, 2021</p>
                </div>

                <?php if ($q['blog_image'] != "") { ?>
                    <div class="blog__imageContainer">
                        <img src="<?php echo $q['blog_image'] ?>" alt="">
                    </div>
                <?php } ?>

                <div class="blogPage__content">

                    <?php if (isset($lang) and ($lang == "hi")) { ?>
                        <p class='blog-content'><?php echo nl2br(strip_tags($q['blog_content_hindi'])); ?></p>
                    <?php } else { ?>
                        <p class='blog-content'><?php echo nl2br($q['content']); ?></p>
                    <?php } ?>
                </div>


                <button class = "blog__category"><?php echo $q['category']; ?></button>


                <!-- *************************** -->

                <?php if ($_SESSION['loggedin']) { ?>

                    <div class="blog__likes">

                        <?php 

                            $sql = $conn->prepare("SELECT id from blog_likes where blog = ?");
                            $sql->bind_param("i", $id);
                            $id = $q['id'];
                            $sql->execute();
                            $result = $sql->get_result();
                            $ans = mysqli_num_rows($result);
                        ?>
                    
                        <a href = "like.php?type=article&id=<?php echo $q['id']; ?>&user_id=<?php echo $q['user_id']; ?>">
                            <i class="far fa-star"></i>
                            <span name = "blog__likes-count"><?php echo ($ans); ?></span>

                            <?php
                            $user = $_SESSION['uid'];
                            $id = $q['id'];
                            $query = "SELECT id FROM blog_likes WHERE (user =$user AND blog = $id)";
                            $result = mysqli_query($conn, $query);
                            $ans = mysqli_num_rows($result);

                            if ($ans === 1) { ?>
                                    
                                <p class = "like-msg">You have liked this post</p>
                                        
                            <?php } ?>
                        </a>
                        
                    </div>

                <?php } ?>
               
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['uid'] == $q['user_id']) { ?>
                    <div class='action-btns'>
                        <a href="translateBlog.php?lang=<?php echo "hi"; ?>&id=<?php echo $q['id']?>" >Translate</a>
                        <a href="editBlog/<?php echo $q['id']?>" >Edit</a>
                        <form method = "POST">
                            <input type='text' hidden name = "id" value = "<?php echo $q['id']; ?>">
                            <button name = "delete" id='delete-post-btn'>Delete</button>
                        </form>
                    </div>
                <?php } ?>

                <div class="blogPage__suggestions">
                    <div class="suggestion__title">
                        <h2> <?php echo (($lang == "hi") ? "आपको ये पोस्ट पसंद आ सकती हैं" : "You may like these posts")?> </h2>
                    </div>

                    <?php 
                        $sql = $conn->prepare("SELECT * FROM blogsdata ORDER BY id DESC LIMIT 3");
                        $sql->execute();
                        $result = $sql->get_result();
                    ?>

                    <div class="posts_box">
                        <?php foreach ($result as $r) { ?>

                            <div class="suggestion__posts">
                                <div class="post">
                                    <div class="post_img">
                                        <img src="<?php echo $r['blog_image']; ?>" alt="">
                                    </div>
                                    <div class="post_title">
                                        <a href = "http://localhost/BlogIt/blogPage.php?lang=<?php echo $lang; ?>&id=<?php echo $r['id']; ?>"><?php echo (($lang == 'hi') ? $r['blog_title_hindi']: $r['title'] ); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="blog__comments-container">

                    <?php if (isset($_SESSION['loggedin'])){ ?>
                        <h2> <?php echo (($lang == 'hi') ? 'अपनी टिप्पणी डालें' : 'Post a comment' )?> </h2>
                    <?php } else { ?>
                        <h2><?php echo (($lang == 'hi') ? 'टिप्पणियाँ' : 'Comments' )?></h2>
                    <?php } ?>

                    <?php if (isset($_SESSION['loggedin'])) { ?>
                        <form action="comments.php" method="POST">
                            <input type="text" name = 'comment-box' placeholder = <?php echo (($lang == "hi") ? "टिप्पणी..." : "Comment..." ); ?> autocomplete = "off">
                            <input type="text" name = 'user-id' value = "<?php echo $_SESSION['uid']?>" hidden>
                            <input type="text" name = 'blog-id' value = "<?php echo $q['id']?>" hidden>
                            <button name = 'comment-btn'><?php echo (($lang == "hi") ? "टिप्पणी" : "Comment" ); ?></button>
                        </form>
                    <?php } ?>

                    <?php
                        include "comments.php";
                        $blog_id = $q['id'];
                        $sql_query = "SELECT userdetails.name, comment, id FROM userdetails JOIN comments ON userdetails.user_id = uid WHERE bid = $blog_id";
                        $result = mysqli_query($conn, $sql_query);
                        $ans = mysqli_num_rows($result);
                    ?>

                    <div class="blog__comment-box">
                        <?php if ($ans == 0) { ?>
                            <h2><?php echo (($lang == 'hi') ? 'दिखाने के लिए कोई टिप्पणी नहीं' : 'No comments to show' )?></h2>
                        <?php } ?>

                        <?php foreach($result as $r) { ?>
                            <div class="blog__comment">
                         
                                <div class="comment__username">
                                    <h3><?php echo $r['name']?></h3>
                                </div>
                                <br>
                                <div class="comment__content">
                                    <p><?php echo $r['comment']?></p>
                                </div>

                                <div class="blog__likes">
                                    <a href = "comments.php?type=comment&id=<?php echo $r['id']; ?>">
                                        <?php 
                                            $sql = $conn->prepare("SELECT likes FROM comments WHERE id = ?");
                                            $sql->bind_param("i", $cid);
                                            $cid = $r['id'];
                                            $sql->execute();
                                            $result = $sql->get_result();
                                            $ans = $result->fetch_assoc();
                                        ?>
                                        <i class="far fa-star"></i>
                                        <span name = "blog__likes-count"><?php echo ($ans['likes']); ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div> 
            <?php } ?>
        </div>

        <div class="index__bloggers hide-style quotes-container">

            <!-- ***************** Sidebar - Social Section ****************** -->
            <div class="social__container">
                <div class="social__title">
                    <h3 class="social__heading"> <?php echo $language[$lang][6]; ?> </h3>
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
                        <?php echo $language[$lang][7]; ?>
                    </h3>
                </div>
                <?php 
                    $sql = $conn->prepare("SELECT * from blogsdata ORDER BY id ASC LIMIT 3");
                    $sql->execute();
                    $result = $sql->get_result();
                
                    foreach($result as $r) {  ?>

                    <div class="popularPosts__content">
                        <div class="popularPosts__img">
                            <img src="<?php echo $r['blog_image']; ?>" alt="popular-post-image">
                        </div>
                        <div class="popularPosts__info">

                            <?php 
                                if ($lang == 'hi'){
                                    $content = $r['blog_content_hindi'];
                                    $stripped_content = strip_tags($content);
                                    $char_length = 190;
                                } else {
                                    $content = $r['content'];
                                    $stripped_content = strip_tags($content);
                                    $char_length = 60;
                                }
                            ?>

                            <a href="http://localhost/BlogIt/blogPage.php?lang=<?php echo $lang; ?>&id=<?php echo $r ['id']?>">
                                <?php echo substr($stripped_content, 0, $char_length) . "..."; ?>
                            </a>

                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- *************** SideBar - Category Section ****************** -->

            <div class="category__container">
                <div class="category__title">
                    <h3 class="category__heading">
                        <?php echo $language[$lang][8]; ?>
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

    <!-- Footer -->

    
    <div class="footer">

        <div class="about">
            <h3><?php echo ($lang == 'hi') ? $language[$lang][9] : $language[$lang][9]; ?></h3>
            
            <?php 

                $about = ($lang == 'hi') ? 'लोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने एक प्रकार की गैली ली और इसे एक प्रकार की नमूना पुस्तक बनाने के लिए हाथापाई की। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है।' : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.";
            ?>
            <p><?php echo substr($about, 0, 170) . "..."; ?></p>
        </div>

        <div class="details">

            <div class="location">
                <i class="fas fa-map-marker-alt"></i>
                <div class="location-details">

                    <p><?php echo ($lang == 'hi') ? 'उदाहरण स्ट्रीट।' : 'Example Street.' ?></p>
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
                    <a href="home"><i style = "color: #0488d1;" class="fas fa-caret-right"></i> <?php echo $language[$lang][4]?> </a>
                </li>
                <li>
                    <a href="login"><i style = "color: #0488d1;" class="fas fa-caret-right"></i> <?php echo $language[$lang][1]?> </a>
                </li>
                <li>
                    <a href="register"><i style = "color: #0488d1;" class="fas fa-caret-right"></i> <?php echo $language[$lang][2]?> </a>
                </li>
            </ul>
        </div>
    </div>
    
<script src="static/js/like.js"></script>

   
<?php require_once('partials/footer.php') ?>