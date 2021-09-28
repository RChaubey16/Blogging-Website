<!-- navbar -->
<?php 
    include "dbLogic.php";
    include "translation.php";
    $lang = !empty($_GET['lang']) ? $_GET['lang'] : "en";
?>
<nav class="nav">
        <div class="left-div">
            <a href="index" class="icon">
                BLOG IT!
            </a>
            <span class="nav__languagesDiv">
                <a href="index">English</a>
                <a href="home.php?lang=hi">Hindi</a>
            </span>
        </div>

        <div class="nav__searchContainer">
            <form action="search.php" method = "GET">
                <input type="text" name='searchBar' class="nav__searchBar" placeholder=<?php echo ( ($lang == "hi") ? "खोजें " : "Search" ) ?> autocomplete="off" >
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
                            <a href="logout"><?php echo $language[$lang][2]; ?></a>
                        </li>
                    </ul>
                </div>

            <?php } else { ?>

                <div class="nav-links">
                    <ul>
                        <li>
                        <!-- <a href="login"><?php echo translate("Login"); ?></a> -->
                        <a href=<?php echo ( ($lang == "hi") ? "login.php?lang=hi" : "login" ) ?>><?php echo $language[$lang][0]; ?></a>
                        </li>
                        
                        <li>
                            <!-- <a href="register"><?php echo translate("Register"); ?></a> -->
                            <a href=<?php echo ( ($lang == "hi") ? "register.php?lang=hi" : "register" ) ?>><?php echo $language[$lang][1]; ?></a>
                        </li>
                    </ul>
                </div>

            <?php } ?>


            
    </div>
</nav>
