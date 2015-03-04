<?php
session_start();
include_once dirname(__FILE__).('/../blogme.php'); 
if(!isset($_SESSION['logged']))
{
    header("Location: index.php");
}
?>
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
    <article>
    <h3>Nowy post</h3>
    <form action="post.php" method="post"> 
        Tytul: <input type="text" name="title" value="Tytuł posta"><br><br>
        Tresc:
        <textarea rows="8" cols="80" name="content">
            Wprowadź tutaj treść swojego posta.
        </textarea> 
        <input type="submit" value="Stworz"> 
    </form>
    </article>
    <div class="hr"></div>
    
    <footer>&copy; Maciej ekicam2 Drozdz</footer>
    <a href="logout.php">Wyloguj</a>
    </section>
</body>
</head>

