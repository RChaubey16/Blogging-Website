<div class = 'nav-box' id='nav-box'>

    <?php if (isset($_SESSION['username'])) { ?>
        <div class="user">
            <a class = 'nav-box-user'><?php echo $_SESSION['username']?></a>
        </div>
    <?php } ?>
            
    <?php if (isset($_SESSION['loggedin'])) { ?>

        <div class="nav-links">
            <ul>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
                <li id = 'close-menu-btn-box'>
                    <a id = "close-menu-btn"><i class="far fa-window-close"></i></a>
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
                <li id = 'close-menu-btn-box'>
                    <a id = "close-menu-btn"><i class="far fa-window-close"></i></a>
                </li>
            </ul>
        </div>

    <?php } ?>
                
</div>