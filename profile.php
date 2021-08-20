<?php 
    include "dbLogic.php";
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("Location: home.php" );
        exit();
    }
?> 

<?php require_once('partials/header.php') ?>

    <title>BlogIt</title>
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


    <div class="profile__container">
        

        <div class="profile__avatar">
            <img src="https://image.flaticon.com/icons/png/512/3237/3237472.png" alt="">
                       
        </div>

        <form action="">

            <label for="uname">Name</label>
            <input type="text" name = 'uname' value = "<?php echo $name ?>" disabled>
            <label for="uname">Email</label>
            <input type="text" name = 'uemail' value = "<?php echo $email ?>" disabled>

        </form>
    </div>



<?php require_once('partials/footer.php') ?>