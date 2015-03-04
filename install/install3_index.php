<?php include_once dirname(__FILE__).'/install.php'; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta chset="utf-8" />
    <title>Installing blogme!</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
    <link rel="Stylesheet" type="text/css" href="install.css" />
</head>
<body>
<header>Blogme installer</header>
    <article> 
    <h1>Krok 3/3</h1>
    <div class="hr"></div>
    <?php install($_POST['nick'], $_POST['password'], $_POST['mail']);?>
    <p class="warning"><b>Po poprawnej instalacji nalezy usunac folder install z glownego katalogu strony!</b></p>
    <a href="../index.php"><p class="ok">Kliknij aby wrocic do strony glownej</p></a>
    <div class="hr"></div>
    <footer>&copy; Maciej ekicam2 Drozdz</footer>
    </article>
</body>
</head>