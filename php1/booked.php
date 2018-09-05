<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset = "utf-8"/>
	<title>Wyniki wyszukiwania</title>
	<link rel = "stylesheet" href = "styles.css">
        
        <style>
            body{
        background: url('https://www.dropbox.com/s/elk95ofjy1orqwr/backgorund.png?raw=1');
        background-size:cover;
            }
        </style>
</head>
<body>
    
   <?php 
    require_once "connect.php";
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $id_number=$_POST['id_number'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $build_num=$_POST['build_num'];
    $postcode = $_POST['postcode'];
    
    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    if($connection->connect_errno != 0)
    {
		echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
    }
    else
    { 
        $sql = "INSERT INTO `Klient`  VALUES (NULL,'{$email}','{$name}','{$surname}','{$id_number}','{$city}','{$postcode}','{$street}','{$build_num}');";
        if(mysqli_query($connection,$sql))
        {
            echo"Grejt Succes";
        }
        else
        {
           echo "Query error".$connection->connect_errno."Opis: ".$connection->connect_error;
        }
        $connection->close();
    }  
    ?>
    
    <form action ="index.php" align="center" style="margin-top: 200px;">
        <input type="submit" align = "center" style="background-color: gold;" value="Powrót do wyszukiwania">
    </form>
</body>
</html>