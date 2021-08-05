<?php include "dbLogic.php"; ?> 
<?php require_once('partials/header.php') ?>
    <title>BlogIt | Register</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>
    
    <form class="login-form">
        <span class="login-signup-header">Register</span>
        <div class="field">
          <input
          name = "name"
            placeholder="Name"
            type="text"
            required
          />
        </div>
        <div class="field">
          <input
          name = 'email'
            type="email"
            placeholder="Email"
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

        <div class="field">
          <input
          name = 'confirmPassword'
            type="password"
            placeholder="Confirm password"
            required
          />
        </div>

        <div>
            <button name = "new_user" id='add-post-btn'>Register</button>
        </div>
      </form>
</body>
</html>