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
    <h1>Krok 2/3</h1>
    <div class="hr"></div>
    <br>
    <form action="install3_index.php" method="post"> 
        Nazwa administratora: <input type="text" name="nick" value="username"><br> 
        Haslo administratora: <input type="password" name="password" value="password"><br>
        E-mail administratora: <input type="text" name="mail" value="e-mail"><br>             
        <input type="submit" value="Install"> 
    </form>
    <br>
    <div class="hr"></div>
    <footer>&copy; Maciej ekicam2 Drozdz</footer>
    </article>
</body>
</head>

<?php
$file = fopen("../config.php", "w");
fwrite($file,"<?php
\$blogname = \"".$_POST['blogname']."\";
\$database_hostname = \"".$_POST['hostname']."\";
\$database_name = \"".$_POST['dbname']."\";
\$database_username = \"".$_POST['dbuser']."\";
\$database_password = \"".$_POST['dbpass']."\";
\$database_port = \"".$_POST['dbport']."\";
?>")



?>