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

    <table style=
            "width: 90%;
                text-align: center;
                  background-color: #00CCCC;
                  border: 1px solid black;
                  opacity: 0.89;
                  transform: scale(0.80);
                  filter: alpha(opacity=20); "
            frame = "box" align= "center">
        
        <thead>
            <tr height="80">
                <th>N.rez.</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Dokument</th>
                <th>Adres <br><br/> miasto kod ulica numer</th>
                <th>Data przybycia</th>
                <th>Naleznosc</th>
                <td colspan="2">DZIAŁANIE</td>
            </style>
        </thead>
    
    <tbody>
    <form>
<?php

	require_once "connect.php";
        	$name = $_POST['name1'];
        $surname=$_POST['surname'];
        $res_id = $_POST['res_id'];
	//$arr_date = $_POST['arr_date'];
	//$dep_date = $_POST['dep_date'];
        if(!empty($_POST['name1']) && !empty($_POST['surname']))
        {
            
            $sql = "SELECT Kl.*,termin,cena,Rezerwacja_idRezerwacja FROM Zamowienie JOIN Klient AS Kl ON idKlient=Klient_idKlient WHERE imie = '{$name}' AND nazwisko = '{$surname}'";
            echo $sql;
            
        }
        elseif(!empty($_POST['res_id']))
        {
            $sql = "SELECT Kl.*,termin,cena,Rezerwacja_idRezerwacja FROM Zamowienie JOIN Klient AS Kl ON idKlient=Klient_idKlient WHERE Rezerwacja_idRezerwacja = '{$res_id}'";
        }
	$connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
	//$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	
	if($connection->connect_errno != 0)
	{
		echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
	}
	else
	{


	//$sql = "SELECT * FROM Hotel WHERE lokalizacja = '$place'";

	if($rezultat = @$connection->query($sql))
	{

	while ($row = mysqli_fetch_assoc($rezultat))
        {
        
        ?>
        <form action = "booking.php" method = "post">
            
        <tr height="50">
            
            <td><?php echo $row['Rezerwacja_idRezerwacja'] ?></td>
            <td><?php echo $row['imie'] ?></td>
            <td><?php echo $row['nazwisko'];?></td>
            <td><?php echo $row['nrDowodu'];?></td>
            <td><?php echo $row['adres_miasto']." ", $row['adres_kod pocztowy']." ", $row['adres_ulica']." ", $row['adres_nrBudynku'];?></td>
            <td><?php echo substr($row['termin'],0,10);?></td>
            <td><?php echo $row['cena'];?></td>
            <td><input style ="background-color: gold;
                               width: 100px;" 
                               type = "submit" value = "WPŁATA"/></td>
            <td><input style ="background-color: red;
                               width: 100px;" 
                               type = "submit" value = "ANULACJA"/></td>
             <!-- <input type="hidden" value=<?php //echo $row['idHotel']?> name="id"/> -->
        </tr>
        </form>
        
	<?php
	}
        
	//echo "it works $place $arr_date $dep_date";
	$connection->close();
        }
        
        }
        ?>
        </form>

    </tbody>
    </table>
</body>
</html>
