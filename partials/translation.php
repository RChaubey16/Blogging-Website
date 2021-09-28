<?php 

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