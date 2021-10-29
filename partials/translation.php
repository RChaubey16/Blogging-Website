<?php 

    session_start();
    $lang = !empty($_GET['lang']) ? $_GET['lang'] : "en";
    $_SESSION['lang'] = $lang;

    $language = array(
    'en' => array('Login', 'Register', 'Logout', 'Profile', 'Home', 'RECENT BLOGS', 'Social Plugin', 'Popular Posts', 'Categories', 'About us', 'Read More', 'Remember Me', 'Forgot Password', 'Username', 'Password'), 

    'hi' => array('लॉग इन करें', 'रजिस्टर करें', 'लॉग आउट', 'प्रोफ़ाइल', 'होम', 'नए ब्लॉग', 'सामाजिक प्लगइन', 'लोकप्रिय पोस्ट', 'श्रेणियाँ', 'हमारे बारे में', 'अधिक पढ़ें', 'मुझे याद रखें', 'पासवर्ड भूल गए', 'उपयोगकर्ता नाम', 'पासवर्ड'), 

    // (register, login)
    'ar' => array('تسجيل','تسجيل الدخول'),

    ); 

    // (register, login)


?>