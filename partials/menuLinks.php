<div class = 'nav-box' id='nav-box'>

   
            
    <?php if (isset($_SESSION['loggedin'])) { ?>

        <div class="nav-links">
            <ul>
                <li>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <div class="user">
                            <a href = "profile.php?uid=<?php echo $_SESSION['uid']?>" class = 'nav-box-user'><?php echo $_SESSION['username']?></a>
                        </div>
                    <?php } ?>
                </li>
                <li>
                    <a href="bloggers.php">Bloggers</a>
                </li>
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