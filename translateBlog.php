<?php 
    include "dbLogic.php";
?> 

<?php require_once('partials/header.php') ?>
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<link rel="stylesheet" href="static/css/style.css?v=<?php echo time(); ?>">
    <title>Blog It - Translate</title>
</head>
<body>

    <!-- Navbar -->
    <?php include('partials/navbar.php')?>
    <?php include('partials/menuLinks.php')?>
    

    <div class = 'create-post'>
        
        <?php foreach($query as $q) { ?>

            <form method="POST">
                <input type="text" hidden name = "id" value="<?php echo $q['id']?>">
                <input type="text" name="title" class="create-post-title" placeholder="Blog Title" value = "<?php echo $q['blog_title_hindi'] ?>">
                <br>
                <textarea name="editor1"><?php echo $q['blog_content_hindi']; ?></textarea>
                <input type="text" hidden name = "lang_code" value="<?php echo "hi"; ?>">
                <button name = "translate" id='add-post-btn'>Translate</button>
            </form>

        <?php } ?> 

    </div>
    <script>
        CKEDITOR.replace( 'editor1', {
            width: '70%',
            height: 500,
            uiColor: '#bebdbd',
            removeButtons: 'PasteFromWord'
        } );
    </script>
<?php require_once('partials/footer.php') ?>