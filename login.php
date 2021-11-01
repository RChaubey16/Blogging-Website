<?php include "dbLogic.php"; 

    // restricting the logged in user to access login and registration pages
    session_start();
    include "translation.php";
    $lang = $_SESSION['lang'];
    $lang_non_url = $_COOKIE['lang'];
    if (isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']){
      header("Location: index.php");
      exit();
    }

    $login = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $sql = "SELECT * from userdetails where name = '$username'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);         // after executing the query, an object is returned. "mysqli_fetch_assoc()" converts the object into an associative array

      if ($password == $row['password']){
        $auth = true;
      }

      $hashed_pwd = $row['password'];

      if (password_verify($password, $hashed_pwd) or $auth == true){
           
        if (!empty($_POST['remember'])){

          // Setting cookies
          setcookie("user_login",$_POST['username'], time() + (10 * 365 * 24 * 60 * 60));
          setcookie("user_password",$_POST['password'], time() + (10 * 365 * 24 * 60 * 60));
        }
        else {
          // Unsetting cookies
          if (isset($_COOKIE['user_login']))
          {
            setcookie("user_login", "", time() - 3600);
          }
          if (isset($_COOKIE['user_password']))
          {
            setcookie("user_password", "", time() - 3600);
          }
        }

        $login = true;
        // Creating Sessions
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $row['user_id'];     // as $row is now an associative array, we can access the values via its keys. 
        header('Location: index.php?lang='. $lang . "&info=login");
        exit();
      }
      else {
        $showError = 'Invalid Credentials';
        header('Location: login/error');
        exit();
      }

    }
    

?> 

<?php require_once('partials/header.php') ?>
<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>BlogIt - Login</title>
</head>
<body style = "background-color: #ece9e9;">
    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>
    

    <?php if (isset($_REQUEST['info'])){ ?>

      <?php if($_REQUEST['info'] == 'registered') { ?>
        <div class="alert success-dailog" id="alert">
            Registered Successfully!
            <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
        </div>  
      <?php } else if ($_REQUEST['info'] == 'loggedOut'){ ?>
        <div class="alert success-dailog" id="alert">
                    You have logged out!
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
      <?php } else if ($_REQUEST['info'] === 'present'){ ?>
        <div class="alert error-dailog" id="alert">
                    User already exists!
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
      <?php } else if ($_REQUEST['info'] === 'error') { ?>  
        <div class="alert error-dailog" id="alert">
                    Invalid Username/Password
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
      <?php } else if ($_REQUEST['info'] === 'resetdone') { ?>
        <div class="alert success-dailog" id="alert">
                    Password Changed Successfully! Try logging in again.
                    <svg id="close-btn" onclick= closeFunction() xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.151 17.943l-4.143-4.102-4.117 4.159-1.833-1.833 4.104-4.157-4.162-4.119 1.833-1.833 4.155 4.102 4.106-4.16 1.849 1.849-4.1 4.141 4.157 4.104-1.849 1.849z"/></svg>
                </div>
      <?php } ?>



    <?php } ?>

    <div class="login__container">

      <form action="login.php" class="login-form" method = "POST">
          <span class="login-signup-header"><i class="fas fa-sign-in-alt"></i> <?php echo $language[$lang][0]; ?></span>
          
          <div class="field">
            <input
            name = 'username'
              type="text"
              placeholder=<?php echo (($lang == 'hi')? $language[$lang][13] : $language[$lang][13] ); ?>
              value = "<?php if (isset($_COOKIE['user_login'])) {
                echo $_COOKIE['user_login'];
              } ?>"
              required
              autocomplete = 'off'
            />
          </div>

          <div class="field login__pwdField">
            <input 
            name = 'password'
              type="password"
              placeholder=<?php echo (($lang == 'hi')? $language[$lang][14] : $language[$lang][14] ); ?>
              value = "<?php if (isset($_COOKIE['user_password'])) {
                echo $_COOKIE['user_password'];
              } ?>"
              required
              autocomplete = 'off'
              id = "login__pwd"
            />
            <i class="far fa-2x fa-eye" id = "login__eye"></i>
          </div>

          <div class = "remember-me-box">
            <label for="remember"><?php echo $language[$lang][11]; ?></label>
            <input 
            name = 'remember'
              type="checkbox"
              <?php if (isset($_COOKIE['user_login'])){ ?> checked <?php } ?>
            />
          </div>


          <div class="remember-me-box">
            <a href="forgotPassword"><?php echo $language[$lang][12]; ?>?</a>
          </div>
          
          <div>
              <button name = "new_user_login" id='add-post-btn'><?php echo $language[$lang][0]; ?></button>
          </div>
        </form>
      </div>
<!-- footer -->
<script src="static/js/view-password.js"></script>
<?php require_once('partials/footer.php') ?>
