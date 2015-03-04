<?php
require_once dirname(__FILE__).('/../config.php');

$conn = new mysqli($database_hostname, $database_username, $database_password , $database_name, $database_port);

if ($conn->connect_error) {
  die('Connect failed: '. $conn->connect_error.'<br> Sprawdź czy podane dane logowania do bazy danych są poprawne i spróbuj ponownie.');
}

function install($nick, $password, $mail){
    global $conn;
    createTable();
    createAdmin($nick, $password, $mail);
    createPosts();
    createBlogInfo();
    $conn->close();
}

function createTable(){
    global $conn;
    $sql = "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP,
    admin TINYINT UNSIGNED
    )";
    
    if ($conn->query($sql) == TRUE) {
        echo "<p class=\"ok\">Tabela \"Users\" stworzona poprawnie</p>";
    } else {
        echo "<p class=\"error\">Blad podczas tworzenia tabeli: \"Users\" " . $conn->error . "</p>";
    }
}

function createPosts(){
    global $conn;
    $sql = "CREATE TABLE Posts (
    post_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    author_id INT(6) UNSIGNED NOT NULL,
    title VARCHAR(30) NOT NULL,
    content VARCHAR(255) NOT NULL,
    date TIMESTAMP
    )";
    
    if ($conn->query($sql) == TRUE) {
        echo "<p class=\"ok\">Tabela \"Posts\" stworzona poprawnie</p>";
    } else {
        echo "<p class=\"error\">Blad podczas tworzenia tabeli \"Posts\": " . $conn->error . "</p>";
    }
}

function createBlogInfo(){
    global $conn;
    $sql = "CREATE TABLE bloginfo (
    title VARCHAR(30) NOT NULL,
    motto VARCHAR(30) NOT NULL
    )";
    
    if ($conn->query($sql) == TRUE) {
        echo "<p class=\"ok\">Tabela \"BlogInfo\" stworzona poprawnie</p>";
    } else {
        echo "<p class=\"error\">Blad podczas tworzenia tabeli \"BlogInfo\": " . $conn->error . "</p>";
    }
    
    $sql = "INSERT INTO bloginfo (title, motto)
            VALUES ('Blogme', 'Just smile for me.')";
            
        if ($conn->query($sql) == TRUE) {
            //info jezeli pyknie
            echo "<p class=\"ok\">Informacje o blogu moga zostac zmienione w panelu administratora.</p>";
        } else {
            //coś poszlo nie tak :C
            echo "<p class=\"error\">Napotkano problem podczas wpisywania informacji o blogu: " . $conn->error . "</p>";
        }   
}

function createAdmin($admin, $password, $email){
    global $conn;
    
    $sql = "SELECT COUNT(nickname) FROM Users WHERE nickname = '$admin' OR email = '$email'";
    //zapytaj czy podany nick juz istnieje
    
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    if( $row[0] == 0) {
        
        //wsadz do tabeli
        $sql = "INSERT INTO Users (nickname, password, email, admin)
            VALUES ('$admin', '$password', '$email', '1')";
            
        if ($conn->query($sql) == TRUE) {
            //info jezeli pyknie
            echo "<p class=\"ok\">Konto administratora stworzono poprawnie.</p>";
        } else {
            //coś poszlo nie tak :C
            echo "<p class=\"error\">Napotkano problem podczas tworzenia konta: " . $conn->error . "</p>";
        }   
    }else
    {
        echo "<p class=\"error\">Taki uzytkownik juz istnieje badz ten email jest juz zajety.</p>";
    }

}
?>