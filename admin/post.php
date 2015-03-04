<?php
include_once dirname(__FILE__).('/../blogme.php');

$post = htmlentities($_POST['title']);
$content = htmlentities($_POST['content']);

$sql = "INSERT INTO Posts (author_id, title, content)
    VALUES ('1', '$post', '$content')";
    
if ($conn->query($sql) == TRUE) {
    //info jezeli pyknie
    echo '<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta chset="utf-8" />
    <title>';
    echo getName().'</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
    <link rel="Stylesheet" type="text/css" href="style.css" />
</head>
<body>
<header>';
echo getName().'</header>
    <section> 
    <p class="motto">';
    echo getMotto().'</p>
    <div class="hr"></div>
    <article>
    <center><p class="ok">Post utworzony pomyslnie.</p></center>
    </article>
    <div class="hr"></div>
    
    <footer>&copy; Maciej ekicam2 Drozdz</footer>
    </section>
</body>
</html>';
} else {
    //coś poszlo nie tak :C
    echo "<p class=\"error\">Napotkano problem podczas tworzenia posta: " . $conn->error . "</p>";
}
$conn->close();
?>