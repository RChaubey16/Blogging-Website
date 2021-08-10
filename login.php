<?php include "dbLogic.php"; 

    session_start();
    if (isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']){
      header("Location: index.php");
      exit();
    }

    $login = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * from userdetails where name = '$username' AND password = '$password'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);         // after executing the query, an object is returned. "mysqli_fetch_assoc()" convertsthe object into an associative array



      if ($num == 1){

        if (!empty($_POST['remember'])){
          setcookie("user_login",$_POST['username'], time() + (10 * 365 * 24 * 60 * 60));
          setcookie("user_password",$_POST['password'], time() + (10 * 365 * 24 * 60 * 60));
        }
        else {
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
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $row['user_id'];     // as $row is now an associative array, we can access the values via its keys. 
        header('Location: index.php?info=login');
        exit();
      }
      else {
        $showError = 'Invalid Credentials';
        header('Location: register.php');
        exit();
      }

    }
    

?> 

<?php require_once('partials/header.php') ?>
    <title>BlogIt | Login</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>

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
      <?php }?>

    <?php } ?>

    <form action="login.php" class="login-form" method = "POST">
        <span class="login-signup-header">Login</span>
        
        <div class="field">
          <input
          name = 'username'
            type="text"
            placeholder="Username"
            value = "<?php if (isset($_COOKIE['user_login'])) {
              echo $_COOKIE['user_login'];
            } ?>"
            required
          />
        </div>

        <div class="field">
          <input 
          name = 'password'
            type="password"
            placeholder="Password"
            value = "<?php if (isset($_COOKIE['user_password'])) {
              echo $_COOKIE['user_password'];
            } ?>"
            required
          />
        </div>

        <div class = "remember-me-box">
          <label for="remember">Remember Me</label>
          <input 
          name = 'remember'
            type="checkbox"
            <?php if (isset($_COOKIE['user_login'])){ ?> checked <?php } ?>
          />
        </div>

        <div>
            <button name = "new_user_login" id='add-post-btn'>Login</button>
        </div>
      </form>
<!-- footer -->
<?php require_once('partials\footer.php') ?>