<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials/header.php') ?>
    <link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt | Home</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <?php 

        if (isset($_POST['searchBar'])) {
            $sql = $conn->prepare("SELECT * FROM blogsdata WHERE category = ?");
            $sql->bind_param("s", $category);
            $category = $_POST["searchBar"];
            $sql->execute();
            $result = $sql->get_result();
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

        </div>
    <?php } ?>

<?php require_once('partials/footer.php') ?>