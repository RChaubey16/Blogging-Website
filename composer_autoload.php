<?php 

    
    require_once realpath('vendor/autoload.php');

    $game = new blogit\Game("Cap");
    $animal = new blogit\Animal("Lion");
    $game->displayMsg();
    $animal->displayMsg();

    $data = new \blogit\data\Database();


?>