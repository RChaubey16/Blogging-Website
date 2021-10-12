<?php 

    namespace blogit;

    class Animal {
        public function __construct($animal) {
            $this->name = $animal;
        }

        public function displayMsg(){
            echo "Animal: " . $this->name;
        }
    }

?>