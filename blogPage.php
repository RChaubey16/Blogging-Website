<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials/header.php') ?>

<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Blog</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class = "blog-container">
        <?php foreach($query as $q) { ?>
            <div class="">
                <h1 id = "heading"><?php echo $q['title']; ?></h1>
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

            <p id = "blogPage__author">by <?php echo $blog_user_name;  ?></p>

            <?php if ($q['blog_image'] != "") { ?>
                <div class="blog__imageContainer">
                    <img src="<?php echo $q['blog_image'] ?>" alt="">
                </div>
            <?php } ?>

            <p class='blog-content'><?php echo nl2br($q['content']); ?></p>


            <!-- *************************** -->

            <?php if ($_SESSION['loggedin']) { ?>

                <div class="blog__likes">

                    <?php 

                        $sql = $conn->prepare("SELECT id from blog_likes where blog = ?");
                        $sql->bind_param("i", $id);
                        $id = $q['id'];
                        $sql->execute();
                        $result = $sql->get_result();

                        // $sql = "SELECT id from blog_likes where blog = $id";
                        // $result = mysqli_query($conn, $sql);
                        
                        // $sql = "SELECT blogsdata.id, blogsdata.title, COUNT(blog_likes.id) AS likes FROM blogsdata LEFT JOIN blog_likes ON blogsdata.id = blog_likes.blog GROUP BY blogsdata.id";
                        // $result = mysqli_query($conn, $sql);

                        $ans = mysqli_num_rows($result);
                    ?>
                
                    <a href = "like.php?type=article&id=<?php echo $q['id']; ?>&user_id=<?php echo $q['user_id']; ?>">
                        <i class="far fa-star"></i>
                        <span name = "blog__likes-count"><?php echo ($ans); ?></span>

                    </a>

                </div>

                <?php
                    $user = $_SESSION['uid'];
                    $id = $q['id'];
                    $query = "SELECT id FROM blog_likes WHERE (user = $user AND blog = $id)";
                    $result = mysqli_query($conn, $query);
                    $ans = mysqli_num_rows($result);

                    if ($ans === 1) { ?>
                        
                        <p class = "like-msg">You have liked this post</p>
                            

                <?php } ?>

            <?php } ?>


            
            
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['uid'] == $q['user_id']) { ?>
                <div class='action-btns'>
                    <a href="editBlog.php?id=<?php echo $q['id']?>" >Edit</a>
                    <form method = "POST">
                        <input type='text' hidden name = "id" value = "<?php echo $q['id']; ?>">
                        <button name = "delete" id='delete-post-btn'>Delete</button>
                    </form>
                </div>
            <?php } ?>

            <div class="blog__comments-container">

                <h2>Comments</h2>

                <?php if (isset($_SESSION['loggedin'])) { ?>
                    <form action="comments.php" method="POST">
                        <input type="text" name = 'comment-box' placeholder = "Write a comment.." autocomplete = "off">
                        <input type="text" name = 'user-id' value = "<?php echo $_SESSION['uid']?>" hidden>
                        <input type="text" name = 'blog-id' value = "<?php echo $q['id']?>" hidden>
                        <button name = 'comment-btn'>Comment</button>
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
                        <h2>No comments to show!</h2>
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

    <?php require_once('partials/footer.php') ?>