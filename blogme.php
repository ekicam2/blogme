<?php 
include_once dirname(__FILE__).'/config.php';

$conn = new mysqli($database_hostname, $database_username, $database_password , $database_name, $database_port);
if ($conn->connect_error) {
    die('<p class="error">Connect failed: '. $conn->connect_error."</p>");
}

function getName()
{
    global $conn;
    $row = $conn->query("SELECT `title` FROM `bloginfo`")->fetch_row();
    echo $row[0];
}

function getMotto()
{
    global $conn;
    $row = $conn->query("SELECT `motto` FROM `bloginfo`")->fetch_row();
    echo $row[0];
}

function getPosts()
{
    global $conn;
   if ($result = $conn->query("SELECT * FROM Posts ORDER BY date DESC")) {
        while ($row = $result->fetch_row()) {
            echo '<article>';
            echo "<h3>".$row[2]."</h3>";
            echo "<p class=\"text\">".$row[3]."</p>";
            echo '</article>';
            echo '<div class="hr"></div>';
        }
    }
    else{
        echo $conn->error;
    }
}

?>