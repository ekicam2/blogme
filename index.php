<?php
include_once dirname(__FILE__)."/blogme.php"; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta chset="utf-8" />
    <title><?php getName();?></title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
    <link rel="Stylesheet" type="text/css" href="style.css" />
</head>
<body>
<header><?php getName();?></header>
    <section> 
    <p class="motto"><?php getMotto();?></p>
    <div class="hr"></div>

    <p><?php getPosts();?></p>

    
    <footer>&copy; Maciej ekicam2 Drozdz</footer>
    </section>
</body>
</head>

<?php $conn->close();?>