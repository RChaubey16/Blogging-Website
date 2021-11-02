
<!DOCTYPE html>

<?php $lang_non_url = $_COOKIE['lang']; ?>
<?php if ($lang_non_url == 'ar') { ?>
    <html dir="rtl" lang="ar">
<?php } else { ?>
    <html lang="en" dir = 'ltr'>
<?php } ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href ="http://localhost/BlogIt/" />
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/png/512/1055/1055661.png" type="image/x-icon">
    <link rel="stylesheet" href="static\css\all.css">
    <link rel="stylesheet" href="static\css\index.css?v=<?php echo time(); ?>">

    