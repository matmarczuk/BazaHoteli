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
                  filter: alpha(opacity=20); "
            frame = "box" align= "center">
        
        <thead>
            <tr>
                <th>Nazwa hotelu</th>
                <th>Miejscowosc</th>
                <th>Widok z okna</th>
                <th>Cena za pokój</th>
            </tr>
            </style>
        </thead>
    
    <tbody>
    <form>
<?php

	require_once "connect.php";

	
	$connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
	//$connection = @new mysqli($host,$db_user,$db_password,$db_name);
	
	if($connection->connect_errno != 0)
	{
		echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
	}
	else
	{

	$place = $_POST['place'];
        $pers_num=(int)$_POST['pers_num'];
        $standard = $_POST['room_standard'];
	$arr_date = $_POST['arr_date'];
	$dep_date = $_POST['dep_date'];
        
        $_SESSION['przyjazd'] = $arr_date;
        $_SESSION['wyjazd'] = $dep_date;
        $_SESSION['losob'] = $pers_num;
                
        
	/*$sql = "select  Hotel.nazwa, Hotel.adres_miasto, Hotel.idHotel, WidokZOkna.Widok, Pokoj.Cena, Pokoj.nrPokoju
        from Hotel 
        inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
        join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
        join WidokZOkna on WidokZOkna.idWidokZOkna =  Pokoj.WidokZOkna_idWidokZOkna
        join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
        join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
        where StandardPokoju.StandardPokoju = '$standard'
	and $pers_num <= StandardPokoju.maxLiczbaOsob 
        and Hotel.lokalizacja = '$place'
        and ((Zamowienie.data_od >= '$arr_date' and Zamowienie.data_od >= '$dep_date')
        	or (Zamowienie.data_do <= '$arr_date' and Zamowienie.data_do <= '$dep_date'));";*/
    
		
		
		$sql = "select  Hotel.nazwa, Hotel.adres_miasto, Hotel.idHotel, WidokZOkna.Widok, Pokoj.Cena, Pokoj.nrPokoju
        from Hotel 
        inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
        join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
        join WidokZOkna on WidokZOkna.idWidokZOkna =  Pokoj.WidokZOkna_idWidokZOkna
        join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
        join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
        where StandardPokoju.StandardPokoju = '$standard'
	and $pers_num <= StandardPokoju.maxLiczbaOsob 
        and Hotel.lokalizacja = '$place'
        and Pokoj.nrPokoju not in  (select Pokoj.nrPokoju 
		from Hotel 
		inner join Pietro on Hotel.idHotel = Pietro.Hotel_idHotel 
		join Pokoj on Pokoj.Pietro_idPietro = Pietro.idPietro
		join StandardPokoju on Pokoj.StandardPokoju_idStandardPokoju = StandardPokoju.idStandardPokoju
		join Zamowienie on Pokoj.nrPokoju = Zamowienie.Pokoj_nrPokoju
                where (Zamowienie.data_od <= '$arr_date' and Zamowienie.data_do >= '$dep_date'))
	group by Pokoj.nrPokoju;";
    
	if($rezultat = @$connection->query($sql))
	{

	while ($row = mysqli_fetch_assoc($rezultat))
        {
        
        ?>
        <form action = "booking.php" method = "post">
            
        <tr>
            <td><?php echo $row['nazwa'];?></td>
            <td><?php echo $row['adres_miasto'];?></td>
            <td><?php echo $row['Widok'];?></td>
            <td><?php echo $row['Cena'];?></td>
            <td><input style ="background-color: gold;
                               width: 100px;" 
                               type = "submit" value = "REZERWUJĘ"/></td>
             <input type="hidden" value=<?php echo $row['nrPokoju']?> name="nrPokoju"/>
              <input type="hidden" value=<?php echo $row['idHotel']?> name="idHotel"/>
        </tr>
        </form>
        
	<?php
	}
        
	//echo "it works $place $arr_date $dep_date";
	$connection->close();
        }
        
        }
        ?>
        
        
    </tbody>
    


    </table>
</form>
    <br></br>
    <form action = "index.php" method = "post">
        <input style ="background-color: gold;
                               width: 400px;" 
                               type = "submit" value = "WROC DO WYSZUKIWANIA"/>
    </form>
</body>
</html>
