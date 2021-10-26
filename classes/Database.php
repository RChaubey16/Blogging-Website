<?php 

    class Database {
        public $conn;
        public $result;
        public $sql;

        public function __construct(){
            $this->conn = mysqli_connect("localhost", "root", "root", "blogsite");
            if (!$this->conn){
                echo "<h1>Datbase connection failed</h1>";
            }
        }

        public function fetchAllBlogs(){
            $this->sql = $this->conn->prepare("SELECT * FROM blogsdata ORDER BY id DESC");
            $this->sql->execute();
            $this->result = $this->sql->get_result();
            return $this->result;
        }
    }

   




?>