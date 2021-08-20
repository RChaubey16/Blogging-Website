<?php 
    include "dbLogic.php";
    session_start();
?> 
<?php require_once('partials/header.php') ?>
    <title>BlogIt | Home</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class="carousel-container">
        <div class="carousel-slide">

           
            <picture>
                <source media="(max-width: 465px)" srcset="uploads/resized_IMG-611faaa999c126.57732191.jpg">
                <source media="(max-width: 650px)" srcset="uploads/resized_IMG-1629461690.jpg">
                <img src="uploads/GoldenGate.jpg">
            </picture>


            
        </div>
    </div>
    
    <div class = "index__main">
        <div class="blog-list-box">
            <?php foreach($query as $q) { ?>
                <div class = 'card'>
                
                        <div class = "card-body">
                            <h3 class = 'heading'><?php echo $q['title'] ?></h3>
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




        </div>


        </div>

    </div>
    

<?php require_once('partials/footer.php') ?>
