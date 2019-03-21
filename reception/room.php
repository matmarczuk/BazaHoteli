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
    require_once "../connect.php";
    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    $sql = "SELECT P.nrPokoju,Pi.ktorePietro FROM Zamowienie AS Z JOIN Pokoj AS P ON P.nrPokoju =  Z.Pokoj_nrPokoju  JOIN Pietro AS Pi ON P.Pietro_idPietro=Pi.idPietro WHERE idZamowienie ={$_POST['idZamowienie']};";
    
    
    
    if($connection->connect_errno != 0)
    {
        echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
    }
    else
    {
        if($rezultat = @$connection->query($sql))
            {

                while ($row = mysqli_fetch_assoc($rezultat))
                {   ?>
                    <div class="transbox" style=" text-align: center;"> 
                    Numer pokoju: <?php echo $row['nrPokoju'];?>
                    <br></br>
                    Piętro: <?php echo $row['ktorePietro'];?>
                    <form action = "client_booked.php" method="post">
                        <input type="submit" value="Oznacz pobyt">
                        <input type="hidden" value=<?php echo $_POST['idZamowienie']?> name="idZamowienie"/>
                    </form>
                    </div>
                    
            
            <?php
                }
            }
    }
    ?>

    
    
</body>
</html>
