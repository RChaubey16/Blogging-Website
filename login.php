<?php require_once('partials/header.php') ?>
    <title>BlogIt | Login</title>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials\navbar.php')?>
    
    <form class="login-form">
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

        <div className="field">
          <button id = 'add-post-btn'>
            Login
          </button>
        </div>
      </form>
</body>
</html>