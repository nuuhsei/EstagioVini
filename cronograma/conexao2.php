<?php
	$servername = "localhost";
	$database = "cronograma";
	$username = "root";
	$password = "adiemla";

	 $con = mysqli_connect($servername, $username, $password, $database);
	  if (!$con)
        {
            echo "Não foi possível estabelecer conexão com o banco de dados!";
            exit;
        }
        else
            //echo "<br><br><br>conexão estabelecida com o banco de dados!<br><br><br><br>";
?>
