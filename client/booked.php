<?php 
session_start();
?>
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
    require_once "../connect.php";
    
    //dane klienta - sprawdz po id_ czy już jest w bazie - jeżeli tak to weź jego id;
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $id_number=$_POST['id_number'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $build_num=$_POST['build_num'];
    $postcode = $_POST['postcode'];
    
    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    
    //klienta nie ma w bazie
    if($connection->connect_errno != 0)
    {
		echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
    }
    else
    { 
        $sql = "INSERT INTO `Klient`  VALUES (NULL,'{$email}','{$name}','{$surname}','{$id_number}','{$city}','{$postcode}','{$street}','{$build_num}');";
        
        //dodanie nowego klienta
        if(mysqli_query($connection,$sql))
        {
           
        }
        else
        {
           echo "Query error".$connection->connect_errno."Opis: ".$connection->connect_error;
        }
        
        $sql = "SELECT idKlient from Klient WHERE nrDowodu = '{$id_number}'";
        $id_klienta;
        //wyciagniecie jego ID
        if($rezultat = @$connection->query($sql))
        {

            while($row = mysqli_fetch_assoc($rezultat)) 
            {

                $id_klienta = $row['idKlient'];
            //echo print_r($row);       // Print the entire row data
            }
        }
        
        
        $sql = "INSERT INTO `Zamowienie`  VALUES (NULL,'{$_SESSION['przyjazd']}','{$_SESSION['wyjazd']}',{$_SESSION['ost_cena']},{$id_klienta},1,{$_SESSION['rem_nrPokoj']});";
       
        //dodanie do bazy 
        if(mysqli_query($connection,$sql))
        {
            
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
