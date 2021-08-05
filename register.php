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
            placeholder="Name"
            type="text"
            required
          />
        </div>
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

        <div class="field">
          <input
            type="password"
            placeholder="Confirm password"
            required
          />
        </div>

        <div id="create-blog-button">
            <a href="">Register</a>
        </div>
      </form>
</body>
</html>