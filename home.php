<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials\header.php') ?>
    <title>BlogIt | Home</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>
    <?php include('partials\menuLinks.php')?>
    
    <div>
        <div class="blog-list-box">
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                
                        <div class = "card-body">
                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>
                            <div class = "read-more-btn">
                                <a href="blogPage.php?id=<?php echo $q['id']?>&user_id=<?php echo$q['user_id']?>">Read More !</a>
                            </div>
                            
                        </div>
                    
                </div>
            <?php } ?>
        </div>
    </div>
    

<?php require_once('partials\footer.php') ?>
