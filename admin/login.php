<?php
include_once dirname(__FILE__).('/../blogme.php');

$login = htmlentities($_POST['login']);
$pass = htmlentities($_POST['password']);

$login = $conn->escape_string($login);
$pass = $conn->escape_string($pass);

session_start();

$sql = "SELECT * FROM Users WHERE nickname='$login' AND password='$pass'";
if($result = $conn->query($sql))
{
	if($row = $result->fetch_row()>0)
	{
			$_SESSION['logged'] = true;
			echo '<p class="ok">Logowanie ok.</p>';
			header("Location: postindex.php");
		

		
	}else
		{
			$_SESSION['error_logowania'] = true;
            echo '<p class="error">ups.</p>';
			header('Location: index.php');
		}
}
else
{
    echo $conn->error;
}



?>