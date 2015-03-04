<?phpsession_start();
include_once dirname(__FILE__).('/../blogme.php'); ?>
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
    <h3>Nowy post</h3>    <?php     if(isset($_SESSION['error_logowania']) && $_SESSION['error_logowania'] == true)    {        echo '<p class="error">Błąd logowania, sprawdź poprawność wpisanego loginu i hasła a następnie spróbuj ponownie.</p>';        $_SESSION['error_logowania'] = false;    }    ?>
    <form action="login.php" method="post"> 
        Login: <input type="text" name="login" value="Login"><br><br>
        Haslo: <input type="password" name="password" value="Tytułposta"><br><br>
        <input type="submit" value="Loguj"> 
    </form>
    </article>
    <div class="hr"></div>
    
    <footer>&copy; Maciej ekicam2 Drozdz</footer>
    </section>
</body>
</head>

