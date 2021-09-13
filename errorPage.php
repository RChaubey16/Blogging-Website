<?php include "dbLogic.php"; 
  session_start();
  if (isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']){
    header("Location: index.php");
    exit();
  }

?> 

<?php require_once('partials/header.php') ?>
    <link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Register</title>
</head>
<body style = "background-color: #ece9e9;">
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>

    <?php 
        $error = $_SERVER['REDIRECT_STATUS'];

        if ($error == 404){ ?>

        <h2 class = "search__heading">No Blogs related to: <span style = "color: #0488d1;"><?php echo $category; ?></span></h2>

        <div class="search__noDataFound">
            <img src="https://image.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg" alt="">
        </div>

    <?php } ?>
    

<?php require_once('partials/footer.php') ?>