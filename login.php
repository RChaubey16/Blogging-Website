<?php include "dbLogic.php"; ?> 
<?php require_once('partials/header.php') ?>
    <title>BlogIt | Login</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>
    
    <form class="login-form" method = "POST">
        <span class="login-signup-header">Login</span>
        
        <div class="field">
          <input
            type="email"
            placeholder="Email"
            required
          />
        </div>

        <div class="field">
          <input
            type="password"
            placeholder="Password"
            required
          />
        </div>

        <div id="create-blog-button">
            <a href="">Login</a>
        </div>
      </form>
</body>
</html>