<?php 
    if(extension_loaded('gd') && function_exists('gd-info')){
        echo 'Yay';
    } else {
        echo "Nay";
    }
?>



<?php 

$original_image = "uploads\IMG-611a2e459bb001.67294963.jpg";
$output_img = "uploads\new_image.jpg";
$width = 860;
$height = 860;
$org_img_size = getimagesize($original_image);
echo $org_img_size[3];
$res_org = imagecreatefromjpeg($original_image);
$scaled = imagescale($res_org, $width, $height);
imagejpeg($scaled, $output_img);
imagedestroy($res_org);
imagedestroy($scaled);

?> 