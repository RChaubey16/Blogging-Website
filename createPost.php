<?php include "dbLogic.php"; 
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }

?> 
<?php require_once('partials/header.php') ?>
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Create</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <div class = 'create-post'>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" class='create-post-title' placeholder="Blog Title" autocomplete = "off" required>
            <input type="text" name="blog__topic" class = "create-post-title" placeholder = "Blog Category" autocomplete = "off" required>
            <input type="file" name="blog__img" class = "blog-image">
            <textarea name="editor1"></textarea>
            <!-- <textarea name="content" cols="30" rows="40" placeholder="Write your blog here...." required></textarea> -->
            <input type='text' hidden name = "userId" value = "<?php echo $_SESSION['uid']; ?>">
            <button name = "new_post" id='add-post-btn'>Add Post</button>
        </form>
    </div>


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
                    <a href="home.php">> Home</a>
                </li>
                <li>
                     <a href="login.php">> Login</a>
                </li>
                <li>
                    <a href="register.php">> Register</a>
                </li>
            </ul>
        </div>

        <div class="about">
            <h3>About Us</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        </div>
    </div>


    <script>
        CKEDITOR.replace( 'editor1', {
            width: '70%',
            height: 500,
            uiColor: '#bebdbd',
            removeButtons: 'PasteFromWord'
        } );
    </script>
<?php require_once('partials/footer.php') ?>

