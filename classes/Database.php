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

        // Home page queries
        public function fetchAllBlogs(){
            $this->sql = $this->conn->prepare("SELECT * FROM blogsdata ORDER BY id DESC");
            $this->sql->execute();
            $this->result = $this->sql->get_result();
            return $this->result;
        }

        public function fetchHomeBannerBlog(){
            $sql = $this->conn->prepare("SELECT * FROM blogsdata ORDER BY id ASC LIMIT 1");
            $sql->execute();
            $result = $sql->get_result();
            $ans = $result->fetch_assoc();
            return $ans;
        }

        public function fetchHomeCarouselBlogs($lang){
            $sql = $this->conn->prepare("SELECT * FROM blogsdata WHERE lang_code = ? ORDER BY id DESC LIMIT 5");
            $sql->bind_param("s", $lang);
            $sql->execute();
            $result = $sql->get_result();
            return $result;
        }

        public function fetchTwoBlogs(){
            $sql = $this->conn->prepare("SELECT * FROM blogsdata ORDER BY id LIMIT 2");
            $sql->execute();
            $result = $sql->get_result();
            return $result;
        }
    }
