<?php 

    $language = array(
    'en' => array('Login', 'Register', 'Logout', 'Profile', 'Home', 'Recent Blogs', 'Social Plugin', 'Popular Posts', 'Categories', 'About us'), 

    'hi' => array('लॉग इन करें', 'रजिस्टर करें', 'लॉग आउट', 'प्रोफ़ाइल', 'होम', 'नए ब्लॉग', 'सामाजिक प्लगइन', 'लोकप्रिय पोस्ट', 'श्रेणियाँ', 'हमारे बारे में'), 
    ); 

    function translate($text){
        $current_lang = $_GET['lang'];
        if ($current_lang == 'hi' and $text == "Login"){
            $text = "लॉग इन करे";
        } else if($current_lang == 'hi' and $text == "Register"){
            $text = "रजिस्टर करें";
        }
        return $text;
    }

?>