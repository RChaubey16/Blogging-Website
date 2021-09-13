<?php 
    if(extension_loaded('gd') && function_exists('gd-info')){
        echo 'Yay';
    } else {
        echo "Nay";
    }
?>

