<?php 

    include "dbLogic.php";
    $sql = $conn->prepare("DELETE FROM subscribers WHERE email = ?");
    $sql->bind_param("s", $email);
    $email = $_GET['email'];
    $sql->execute();

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
        $email = $_GET['email'];
    
    ?>

    <h2 class = "search__heading">Your email, <?php echo $email; ?> has successfully unsubscribed from BlogIt</h2>

    <form method="POST">
        <h2 class = "search__heading">If unsubscribed accidently, click the button below to re-subscribe again!</h2>
        <input type="text" name="re_subscriber__email"  value="<?php echo $email;?>" hidden>
        <button style = "margin-left: 48%;" name = "re_subscriber__submit" class='submit__btn'>Subscribe</button>
    </form>


<?php require_once('partials/footer.php') ?>