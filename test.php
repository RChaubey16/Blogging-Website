<?php 

include "dbLogic.php";

// $selectedTime = date("H:i:s");
// $endTime = strtotime("-15 minutes", strtotime($selectedTime));
// $expire = date('H:i:s A', $endTime);

// if ($selectedTime > $expire){
//     echo "Expired\n ";
// } else{
//     echo "Active \n";
// }

// var_dump($selectedTime);
// var_dump($expire);


// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo basename($actual_link);
// $ans =  basename("http://localhost/BlogIt/Startups");


// $actual_link = "http://localhost/BlogIt/blogPage.php?id=61&lang=hi";
// $a = parse_url($actual_link);
// echo var_dump($a);
// $b = explode("&", $a['query']);
// echo $b[1];
// $c = explode("/", $a['path']);
// echo $c[2];

$id = 3;
$sql = $conn->prepare("SELECT * FROM blogsdata WHERE id = ?");
$sql->bind_param('i', $id);
$sql->execute();
$res = $sql->get_result();
$ans = $res->fetch_assoc();

// $id = 3;
// $sql = "SELECT * FROM blogsdata WHERE id = $id";
// $res = mysqli_query($conn, $sql);
// $ans = mysqli_fetch_assoc($res);

$blog_id = $ans['blog_id'];
$user_id = $ans['user_id'];
$blog_image = $ans['blog_image'];
$category = $ans['category'];

echo $blog_id . "\n";
echo $user_id . "\n";
echo $blog_image  . "\n";
echo $category . "\n";


setcookie("lang_name", "Hello", time() + (86400 * 30), "/");
$ans = $_COOKIE['lang_name'];
echo $ans;

echo $lang[2];


echo $_COOKIE['lang'];


// $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $uri_segments = explode('/', $uri_path);

// echo $uri_segments[2]; // for www.example.com/user/account you will get 'user'

// echo $ans;
// $sql = $conn->prepare("SELECT category FROM blogsdata");
// $sql->execute();
// $res = $sql->get_result();
// $category = array();
// foreach($res as $r){
//     echo $r['category'];
// }


// if (in_array($ans, $category)){
//     echo "Yay";
// } else {
//     echo "nay";
// }

// output : string(8) "12:28:44" string(8) "12:43:44"


?>

