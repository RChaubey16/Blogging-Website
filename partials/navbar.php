<!-- navbar -->
<?php 
    include "dbLogic.php";
?>
<nav class="nav">
        <div class="left-div">
            <a href="index" class='icon'>
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
                <i id = "bars_img" class="fas fa-2x fa-bars"></i>
                <i id = "close_img" style = "display: none; color: red;" class="fas fa-2x fa-times-circle"></i>
            </div>
            
            <?php if (isset($_SESSION['username'])) { ?>
                <div class="user nav-links">
                    <a href = "profile/<?php echo $_SESSION['uid']?>"><?php echo $_SESSION['username']?></a>
                </div>
            <?php } ?>
          
            <?php if (isset($_SESSION['loggedin'])) { ?>

                <div class="nav-links">
                    <ul>
                        <li>
                            <a href="logout">Logout</a>
                        </li>
                    </ul>
                </div>

            <?php } else { ?>

                <div class="nav-links">
                    <ul>
                        <li>
                        <a href="login">Login</a>
                        </li>
                        
                        <li>
                            <a href="register">Register</a>
                        </li>
                    </ul>
                </div>

            <?php } ?>


            
    </div>
</nav>
