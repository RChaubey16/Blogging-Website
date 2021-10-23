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


session_start();
require 'config.php';
include "partials/translation.php";
$lang = $_SESSION['lang'];

// establishing a connection to the database 
$conn = mysqli_connect($database['host'], $database['username'], $database['password'], $database['database']);

// Checking if the connection is established or not
if (!$conn) {
    echo "<h3>Not able to establish Database connection</h3>";
}

// fetching all the blogs from database

$lang = $_GET['lang'];

if ($lang == 'hi'){
    $sql = "SELECT * FROM blogsdata WHERE lang_code = '$lang' ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
} else {

    $sql = "SELECT * FROM blogsdata WHERE lang_code = '$lang' ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
}

// inserting the new blog into database
if (isset($_REQUEST['new_post'])) {

    $blog_image = $_FILES['blog__img'];

    $filename = $blog_image['name'];
    $filename_tmp = $blog_image['tmp_name'];

    $profile_ext = explode('.', $filename);
    $filecheck = strtolower(end($profile_ext));

    $file_ext_stored = array('jpeg', 'png', 'jpg');

    if (in_array($filecheck, $file_ext_stored)) {

        $destinationFile = "uploads/" . $filename;
        move_uploaded_file($filename_tmp, $destinationFile);
    }


    $title = $_REQUEST['title'];
    $content = $_REQUEST['editor1'];
    $category = $_REQUEST['blog__topic'];
    $userId = $_REQUEST['userId'];
    $userName = $_REQUEST['user_name'];

    $sql_query = "INSERT INTO blogsdata(title, content, blog_title_hindi, blog_content_hindi, user_id, blog_image, category) VALUES('$title', '$content', '', '', $userId, '$destinationFile', '$category')";
    mysqli_query($conn, $sql_query);

    // Sending emails

    // getting latest blog
    $sql = $conn->prepare("SELECT * from blogsdata ORDER BY id DESC LIMIT 1");
    $sql->execute();
    $ans = $sql->get_result();
    $result = mysqli_fetch_assoc($ans);
    $blog = $result['id'];

    $sql = $conn->prepare("SELECT email FROM subscribers");
    $sql->execute();
    $res = $sql->get_result();


    foreach ($res as $r) {

        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 4;          //to get detailed output of server                      // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $email['myEmail'];                 // SMTP username
        $mail->Password = $email['myPass'];                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom($email['myEmail'], 'BlogIt');
        $mail->addAddress($r['email']);     // Add a recipient

        $mail->addReplyTo($email['myEmail']);

        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'New Blog is published!';
        $mail->Body    = '<div>
                                <h2>New Blog Published</h2>
                            </div>' .
            '<p style = "font-size: 1.4rem"> To read the blog, <a style = "text-decoration:none" href = "http://localhost/BlogIt/blogPage.php?id=' . $blog . '"> Click here </a></p>' .
            '<p style = "font-size: 1.4rem"> To unsubscribe this website <a style = "text-decoration:none" href = "http://localhost/BlogIt/unsubscribe.php?email=' . $r['email'] . '"> Click here </a></p>';

        $mail->AltBody = $alt_body;

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            // redirecting to the home page
            header("Location: index.php?info=added");
            exit();
            echo 'Message has been sent';
        }
    }
}

// edit page query
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM blogsdata WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}

// update the blog query
if (isset($_REQUEST['update'])) {

    // using mysql prepared
    $sql = $conn->prepare("UPDATE blogsdata SET title = ?, content = ?
        WHERE id = ?");
    $sql->bind_param("ssi", $title, $content, $id);

    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['editor1'];
    $sql->execute();

    // Normal SQL query
    // $sql = "UPDATE blogsdata SET title = '$title', content = '$content'
    //  WHERE id = $id";
    // mysqli_query($conn, $sql);

    header("Location: index.php?info=updated");
    exit();
}

// Delete the blog query
if (isset($_REQUEST['delete'])) {

    $sql = $conn->prepare("SELECT blog_image from blogsdata WHERE id = ?");
    $sql->bind_param("i", $id);
    $id = $_REQUEST['id'];
    $sql->execute();
    $result = $sql->get_result();
    $ans = $result->fetch_assoc();
    $filename = $ans['blog_image'];
    if (isset($filename)) {
        // deletes the image from /uploads as well
        unlink($filename);
    }

    $sqlDelete = $conn->prepare("DELETE FROM blogsdata WHERE id = ?");
    $sqlDelete->bind_param("i", $id);
    $sqlDelete->execute();
    // $sql = "DELETE FROM blogsdata WHERE id = $id";
    // $query = mysqli_query($conn, $sql);

    header("Location: index.phpinfo=deleted");
    exit();
}


// Registration query
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_REQUEST['new_user'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $pwd = $_REQUEST['password'];
    $con_pwd = $_REQUEST['confirmPassword'];

    /* Checking if user already exists */
    $query = "SELECT email from userdetails where email = '$email'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    if ($num >= 1) {
        header("Location: register.php?info=present");
        exit();
    }

    /* If user does not exists then register the user */
    if ($pwd === $con_pwd) {

        $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
        $bio = '';

        $sql_query = "INSERT INTO userdetails(name, email, password, bio, date) VALUES('$name', '$email', '$hashed_password', '$bio', current_timestamp())";
        mysqli_query($conn, $sql_query);
        header("Location: login.php?info=registered");
        exit();
    } else {
        header("Location: register.php?info=error");
        exit();
    }
}


// Updating profile bio 
if (isset($_POST['profile__btn'])) {

    // Using Mysql prepared statement
    $sql = $conn->prepare("UPDATE userdetails SET bio = ? WHERE user_id = ?");
    $sql->bind_param("si", $bio, $profile_id);
    $bio = $_POST['profile__bio'];
    $profile_id = $_POST['profile__user_id'];
    $sql->execute();

    // Normal SQL Queries
    // $sql = "UPDATE userdetails SET bio = '$bio' WHERE user_id = $profile_id";
    // mysqli_query($conn, $sql);

    header("Location: profile.php?uid=$profile_id");
    exit;
}

// Subscribe section

if (isset($_POST['subscriber__submit'])) {
    $sql = $conn->prepare("INSERT INTO subscribers(email) VALUES(?)");
    $sql->bind_param('s', $email);
    $email = $_POST['subscriber__email'];
    $sql->execute();
    header("Location: home.php?info=subscribed");
}

if (isset($_POST['re_subscriber__submit'])) {
    $sql = $conn->prepare("INSERT INTO subscribers(email) VALUES(?)");
    $sql->bind_param('s', $email);
    $email = $_POST['re_subscriber__email'];
    $sql->execute();
    header("Location: home.php?info=subscribed");
}

// Forgot Passsword

if (isset($_POST['new_pass'])) {

    $pass_email = $_POST['pass_email'];

    $sql = $conn->prepare("SELECT user_id FROM userdetails WHERE email = ?");
    $sql->bind_param("s", $pass_email);
    $sql->execute();
    $res = $sql->get_result();
    $ans = $res->fetch_assoc();
    $userId = $ans['user_id'];

    if (empty($userId)) {
        header("Location: fpemail.php?info=invalid");
        exit;
    }

    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 4;          //to get detailed output of server                      // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $email['myEmail'];                 // SMTP username
    $mail->Password = $email['myPass'];                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom($email['myEmail'], 'BlogIt');
    $mail->addAddress($pass_email);     // Add a recipient

    $mail->addReplyTo($email['myEmail']);

    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Password Reset - BlogIt';
    $mail->Body    = '<div>
                            <h2>BlogIt - Password Reset</h2>
                        </div>' .
        '<p style = "font-size: 1.4rem"> To reset password, <a style = "text-decoration:none" href = "http://localhost/BlogIt/passwordReset.php?id=' . $userId . '"> Click here </a></p>';

    $mail->AltBody = $alt_body;

    if (!$mail->send()) {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {

        // Adding time interval
        $release = date("H:i:s");
        $endTime = strtotime("+15 minutes", strtotime($release));
        $expire = date('H:i:s', $endTime);
        $sql = $conn->prepare("INSERT INTO forgotpassword(user_id, release_time, expire_time) VALUES($userId, '$release', '$expire')");
        $sql->execute();

        // redirecting to the home page
        header("Location: fpemail.php?info=sent");
        exit();
        echo 'Message has been sent';
    }
}

// // password reset 

if (isset($_POST['pass_reset'])) {
    $pass = $_POST['password'];
    $con_pass = $_POST['confirmPassword'];
    $userId = $_POST['user-id'];

    // fetching expire time
    $sql = $conn->prepare("SELECT * FROM forgotpassword WHERE user_id = ?");
    $sql->bind_param("i", $userId);
    $sql->execute();
    $res = $sql->get_result();
    $ans = $res->fetch_assoc();

    $current_time = date("H:i:s");
    $expire_time = $ans['expire_time'];

    // checking if the time interval is valid
    if ($current_time > $expire_time) {

        $sql = $conn->prepare("DELETE FROM forgotpassword WHERE user_id = ?");
        $sql->bind_param("i", $userId);
        $sql->execute();

        header("Location: fpemail.php?info=expired");
        exit;
    }

    // Password confirmation
    if ($pass == $con_pass) {

        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        $sql = $conn->prepare("UPDATE userdetails SET password = ? WHERE user_id = ?");
        $sql->bind_param("si", $hashed_password, $userId);
        $sql->execute();

        header("Location: login.php?info=resetdone");
        exit;
    }

}

  // Translating the blog
if (isset($_POST['translate'])){


    $id = $_GET['id'];
    $sql = $conn->prepare("SELECT * FROM blogsdata WHERE id = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $res = $sql->get_result();
    $ans = $res->fetch_assoc();

    $lang_code = $_POST['lang_code'];
    $blog_id = $ans['blog_id'];
    $title = $_POST['title'];
    $content = $_POST['editor1'];
    $user_id = $ans['user_id'];
    $blog_image = $ans['blog_image'];
    $category = $ans['category'];

    $sql_query = "INSERT INTO blogsdata(blog_id, lang_code, title, content, blog_title_hindi, blog_content_hindi, user_id, blog_image, category) VALUES($id, '$lang_code','$title', '$content', '', '', $user_id, '$blog_image', '$category')";
    $res = mysqli_query($conn, $sql_query);


    // Phase 1
    // $sql = $conn->prepare("UPDATE blogsdata SET blog_title_hindi = ?, blog_content_hindi = ? WHERE id = ?");
    // $sql->bind_param("ssi", $title, $content, $id);
    // $id = $_POST['id'];
    // $title = $_POST['title'];
    // $content = $_POST['editor1'];
    // $sql->execute();

    header("Location: index.php?info=updated");
    exit();
}




?>

