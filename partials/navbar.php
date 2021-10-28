<!-- navbar -->
<?php
include "dbLogic.php";
include "translation.php";
?>
<nav class="nav">
    <div class="left-div">
        <a href="index.php?lang=<?php echo $lang; ?>" class="icon">
            BLOG IT!
        </a>

        <?php
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);

        // Important concept for language translation
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $a = parse_url($url);
        // To get the file (E.g blogPage.php) 
        $b = explode('/', $a['path']);
        $file = $b[2];
        // to get the queries from URL
        $c = explode('&', $a['query']);
        $id = $c[1];
        ?>

        <span class="nav__languagesDiv">

            <button class = "nav__langbtn" id = "english-btn" onclick = "onEnglish()">English</button>
            <button class = "nav__langbtn" id = "hindi-btn" onclick = "onHindi()">Hindi</button>
           
            <!-- <a href="<?php echo $file; ?>?lang=en&<?php echo ($id != NULL) ? $id : ""; ?>" id="language-en">English</a> -->
            <!-- <a href="<?php echo $file; ?>?lang=hi&<?php echo ($id != NULL) ? $id : ""; ?>" id="language-hi">Hindi</a> -->
         
        </span>
    </div>

    <div class="nav__searchContainer">
        <form action="search.php" method="GET">
            <input type="text" name='searchBar' class="nav__searchBar" placeholder=<?php echo (($lang == "hi") ? "खोजें " : "Search") ?> autocomplete="off" required>
            <button name="nav__searchBtn"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="right-nav">

      <div class="menu-icon" id="menu-box">
            <i id="bars_img" class="fas fa-2x fa-bars"></i>
            <i id="close_img" style="display: none; color: red;" class="fas fa-2x fa-times-circle"></i>
        </div>

        <?php if (isset($_SESSION['username'])) { ?>
            <div class="user nav-links">
                <a href="profile/lang/<?php echo $lang; ?>/uid/<?php echo $_SESSION['uid'] ?>"><?php echo $_SESSION['username'] ?></a>
            </div>
        <?php } ?>

        <?php if (isset($_SESSION['loggedin'])) { ?>

            <div class="nav-links">
                <ul>
                    <li>
                        <a href="logout.php?lang=<?php echo $lang; ?>"><?php echo $language[$lang][2]; ?></a>
                    </li>
                </ul>
            </div>
        <?php } else { ?>

            <div class="nav-links">
                <ul>
                    <li>
                        <a href=<?php echo (($lang == "hi") ? "login.php?lang=hi" : "login") ?>><?php echo $language[$lang][0]; ?></a>
                    </li>

                    <li>
                        <a href=<?php echo (($lang == "hi") ? "register.php?lang=hi" : "register") ?>><?php echo $language[$lang][1]; ?></a>
                    </li>
                </ul>
            </div>

        <?php } ?>
    </div>
</nav>