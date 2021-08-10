<div class = 'nav-box' id='nav-box'>

    <?php if (isset($_SESSION['username'])) { ?>
        <div class="user">
            <span><?php echo $_SESSION['username']?></span>
        </div>
    <?php } ?>
            
    <?php if (isset($_SESSION['loggedin'])) { ?>

        <div class="nav-links">
            <ul>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
    </div>

    <?php } else { ?>

        <div class="nav-links">
            <ul>
                <li>
                    <a href="login.php">Login</a>
                </li>
                            
                <li>
                    <a href="register.php">Register</a>
                </li>
            </ul>
        </div>

    <?php } ?>
                
</div>