<?php 
    include "dbLogic.php";
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }

    // edit user name (profile page)
    if (isset($_REQUEST['profile-submit-btn'])){
        $id = $_REQUEST['profile-user-id'];
        $name = $_REQUEST['uname'];
        $sql = "UPDATE userdetails SET name = '$name' where user_id = $id";
        $result = mysqli_query($conn, $sql);
        header("Location: profile.php?updated");
        exit;
    }

?> 

<?php require_once('partials/header.php') ?>

    <title>BlogIt | Profile</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <h2 class = "profile__heading">Profile</h2>

    <?php 

        if (isset($_REQUEST['uid'])){
            $id = $_REQUEST['uid'];
            $sql = "SELECT name, email from userdetails where user_id = $id";
            $ans = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($ans);
            $name = $result['name'];
            $email = $result['email'];
        
        } else {
            header("Location: index.php");
            exit;
        }
    
    ?>

    <div class="profile__box">

        <div class="profile__container">
            

            <div class="profile__avatar">
                <img src="https://image.flaticon.com/icons/png/512/3237/3237472.png" alt="">
                        
            </div>

        


            <form action="" method = "POST">

            <!-- <?php if (isset($_REQUEST['uid'])) { ?>
                    <?php if ($_REQUEST['uid'] == $_SESSION['uid']) { ?>
                    
                        <label for="uname">Name</label>
                            <input type="text" name = 'uname' value = "<?php echo $_SESSION['username'] ?>" > 
                        <label for="uname">Email</label>
                            <input type="text" name = 'uemail' value = "<?php echo $email ?>" disabled>
                        <input type="text" name = 'profile-user-id' value = "<?php echo $_SESSION['uid']?>" hidden>
                        <button name = 'profile-submit-btn' id = "add-post-btn">Submit</button>

                    <?php } else { ?>
                        <label for="uname">Name</label>
                            <input type="text" name = 'uname' value = "<?php echo $name ?>" disabled>
        
                        <label for="uname">Email</label>
                            <input type="text" name = 'uemail' value = "<?php echo $email ?>" disabled>

                    <?php } ?>
                <?php } ?> -->

                <label for="uname">Name</label>
                    <input type="text" name = 'uname' value = "<?php echo $name ?>" disabled>
        
                <label for="uname">Email</label>
                    <input type="text" name = 'uemail' value = "<?php echo $email ?>" disabled>
                
                
            
            </form>
        
        </div>

            <?php

                if (isset($_REQUEST['uid'])){
                    $id = $_REQUEST['uid'];
                    $sql = "SELECT * from blogsdata where user_id = $id";
                    $ans = mysqli_query($conn, $sql);

                } else {
                    header("Location: index.php");
                    exit;
                }

            
            ?>



            <div class="personal-blog-list">
                <?php if (mysqli_num_rows($ans) == 0) { ?>
                    <h1>No Blogs to show!</h1>
                <?php } ?>

                <?php foreach($ans as $a) { ?>
                    <div class = 'card'>
                    
                            <div class = "card-body">
                                <h3 class = 'heading'><?php echo $a['title'] ?></h3>
                                <div class = "read-more-btn">
                                    <a href="blogPage.php?id=<?php echo $a['id']?>&user_id=<?php echo$q['user_id']?>">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                                
                            </div>
                        
                    </div>
                <?php } ?>
            </div>
            

           
                    
    </div>




<?php require_once('partials/footer.php') ?>