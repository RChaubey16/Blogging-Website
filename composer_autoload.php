<?php 


    require 'vendor/autoload.php';

    $game = new blogit\Game("IronMan");
    $animal = new blogit\Animal("Lion");
    $game->displayMsg();
    $animal->displayMsg();



?>