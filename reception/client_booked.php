<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset = "utf-8"/>
	<title>Wyniki wyszukiwania</title>
	<link rel = "stylesheet" href = "styles.css">
        <style>
            th, td{
    border-bottom: 1px solid #000000;
}
tr:hover {background-color:#f5f5f5;}
th {
    background-color: #4CAF50;
    color: white;
}
        </style>
</head>
<body>
       <?php
        require_once "connect.php";
        
        
        $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);

        if($connection->connect_errno != 0)
	{
		echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
	}
	else
	{
	$sql = "SELECT * FROM Zamowienie WHERE idZamowienie = {$_POST['idZamowienie']};";
            if($rezultat = @$connection->query($sql))
            {

                while ($row = mysqli_fetch_assoc($rezultat))
                {    $sql = "INSERT INTO Pobyt VALUES(NULL,'{$row['data_od']}','{$row['data_do']}',{$_POST['idZamowienie']});";

                     if(mysqli_query($connection,$sql))
                    {   ?>
                        <div class ="transbox" style = "text-align: center; margin-top: 100px;">
                            <b>Zapisano pobyt w bazie!</b>
                            <br></br>
                            <form action ="index.php">
                                <input type ="submit" value ="Powrót do panelu recepcji" style="background-color:gold; width: 200px;"/>
                            </form>
                        </div>
                         <?php
                    }
                    else
                    {
                        echo "Query error".$connection->connect_errno."Opis: ".$connection->connect_error;
                    }
                }

            }
        }
       
    ?>
    
    
    
</body>
</html>
