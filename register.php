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
    

    <?php if (isset($_REQUEST['info'])){ ?>

        <?php if($_REQUEST['info'] == 'present') { ?>
            <div class="alert error-dailog" id="alert">
                User already exists!
                <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
            </div>  
        <?php } elseif ($_REQUEST['info'] == 'error') { ?>
          <div class="alert error-dailog" id="alert">
                Error in registering!
                <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
            </div>
        <?php } ?>

    <?php } ?>

    <div class="login__container">
    
      <form action="register.php" class="login-form" method = "POST" autocomplete="off">
          <span class="login-signup-header"><i class="fas fa-user-plus"></i> <?php echo $language[$lang][1]; ?></span>
          <div class="field">
            <input
            name = "name"
              placeholder=<?php echo (($lang == 'hi') ? "नाम" : "Name" )?>
              type="text"
              required
              autocomplete = 'off'
            />
          </div>
          <div class="field">
            <input
            name = 'email'
              type="email"
              placeholder=<?php echo (($lang == 'hi') ? "ईमेल" : "Email" )?>
              required
              autocomplete = 'off'
            />
          </div>
          <div class="field">
            <input
            name = 'password'
              type="password"
              placeholder=<?php echo (($lang == 'hi') ? "पासवर्ड" : "Password" )?>
              required
              autocomplete = 'off'
            />
          </div>

          <div class="field">
            <input
            name = 'confirmPassword'
              type="password"
              placeholder=<?php echo (($lang == 'hi') ? "पासवर्ड की पुष्टि कीजिये" : "Confirm Password" )?>
              required
              autocomplete = 'off'
            />
          </div>

          <div>
              <button name = "new_user" id='add-post-btn'><?php echo $language[$lang][1]; ?></button>
          </div>
        </form>
      </div>
<?php require_once('partials/footer.php') ?>