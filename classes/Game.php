<?php 

    namespace blogit;

    class Game {
        public function __construct($name) {
            $this->name = $name;
        }

        public function displayMsg(){
            echo "Name: " . $this->name;
        }
    }

?>