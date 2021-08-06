<?php include "dbLogic.php"; 

    $login = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * from userdetails where name = '$username' AND password = '$password'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);

      if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
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

    <form action="login.php" class="login-form" method = "POST">
        <span class="login-signup-header">Login</span>
        
        <div class="field">
          <input
          name = 'username'
            type="text"
            placeholder="Username"
            required
          />
        </div>

        <div class="field">
          <input 
          name = 'password'
            type="password"
            placeholder="Password"
            required
          />
        </div>

        <div>
            <button name = "new_user_login" id='add-post-btn'>Login</button>
        </div>
      </form>
</body>
</html>