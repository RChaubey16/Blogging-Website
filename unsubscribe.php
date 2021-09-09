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
    
    <h2 class = "search__heading">Successfully unsubscribed from BlogIt</h2>

    <div class="search__noDataFound">
        <img src="https://lh3.googleusercontent.com/proxy/Q_UZNMkNYkvw7X6cCMMAiwbRdzvNb7SXdTCF4XyBt0kRYAaDGbeudkjH8-XMCIPqe8-KLjLwelGQa7a2YldDG03ykm3ssjrIQz-Il-WTP8ZneNLtetD6uayjddGs13xJh8kNYu5hxVTHgsmBccGEDOQWGIDs7S4" alt="">
    </div>
    
    
    
<?php require_once('partials/footer.php') ?>