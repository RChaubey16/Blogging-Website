<!-- navbar -->
<?php 
    include "dbLogic.php";
?>
<nav class="nav">
        <div class="left-div">
            <a href="index.php" class='icon'>
                BLOG IT!
            </a>
        </div>

        <div class="nav__searchContainer">
            <form action="search.php" method = "GET">
                <input type="text" name='searchBar' class="nav__searchBar" placeholder="Search Query" autocomplete="off" >
                <button name = "nav__searchBtn"><i class="fas fa-search"></i></button>
            </form>
        </div>
        
        <div class="right-nav">


            <div class="menu-icon" id = "menu-box">
                <!-- <img src="static\images\icons8-menu-24.png" alt="" > -->
                <i class="fas fa-2x fa-bars"></i>
            </div>


            <?php if (isset($_SESSION['username'])) { ?>
                <div class="user nav-links">
                    <a href = "profile.php?uid=<?php echo $_SESSION['uid']?>"><?php echo $_SESSION['username']?></a>
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
</nav>
