<?php 
    include "dbLogic.php";
    session_start();
    include "translation.php";
    $lang = $_SESSION['lang'];

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php?lang=" . $lang );
        exit();
    }
?> 

<?php require_once('partials/header.php') ?>
<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Feed</title>
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
            <?php 
                $content = $ans['content'];
                $stripped_content = strip_tags($content);
            ?>

            <p id = "content"><?php echo substr($stripped_content, 0, 72) . "...."; ?></p>

        </div>
        <div class="home__bannerContent-btn">
            <button> <a href="blogPage.php?lang=<?php echo $lang; ?>&id=<?php echo $ans['id']?>">Read More</a> </button>
        </div>
    </div>

    <?php } ?>


    <div class = "index__container">

        <div class="index__btns">

            <?php if ($_SESSION['loggedin'] == true) { ?>
                <div id="create-blog-button">
                    <a href="createPost">+ Create a new Blog</a>
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

        <div class="home__blogCardsBox">
            <?php  
                $sql = $conn->prepare("SELECT * FROM blogsdata ORDER BY id LIMIT 2");
                $sql->execute();
                $result = $sql->get_result();
            ?>
            <div class="home__blogCards">
                <?php foreach ($result as $r) { ?>
                    <div class="home__blogCard1">
                        <a href="blogPage.php?lang=<?php echo $lang; ?>&id=<?php echo $r['id']?>">
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

        <div class = "index__main">

            <div class="blog-list-box">
                 
                <?php foreach($query as $q) { ?>
                    <div class = 'card'>
                        <div>
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
                                    <a href="blogPage.php?lang=<?php echo $lang; ?>&id=<?php echo $q['id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                                    <a href="search.php?lang=<?php echo $lang; ?>&searchBar=<?php echo $q['category'];?>" style = 'background-color: gray;'><?php echo $q['category'];?></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

             </div>

             <div class="index__bloggers hide-style">

                <h2 id = "index__bloggersHeading"> <?php echo ($lang == 'hi') ? "ब्लॉगर्स" : "Bloggers" ?> </h2>

                <?php 
                    $sql = "SELECT * FROM userdetails ORDER By user_id DESC";
                    $res = mysqli_query($conn, $sql);
                                
                        foreach($res as $a) {  
                                    
                            if ($_SESSION['username'] == $a['name']){
                                continue;
                            } else { ?>

                                <a href="profile.php?lang=<?php echo $lang; ?>&uid=<?php echo $a['user_id']?>">

                                    <div class="blogger-container">
                                        <div class="blogger-avatar">
                                            <img src="https://image.flaticon.com/icons/png/512/1077/1077012.png" alt="">
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

    

<?php require_once('partials/footer.php') ?>