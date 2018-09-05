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
                <th>Udogodnienia</th>
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
        $pers_num=$_POST['pers_num'];
	//$arr_date = $_POST['arr_date'];
	//$dep_date = $_POST['dep_date'];

	$sql = "SELECT * FROM Hotel WHERE lokalizacja = '$place'";

	if($rezultat = @$connection->query($sql))
	{

	while ($row = mysqli_fetch_assoc($rezultat))
        {
        
        ?>
        <form action = "booking.php" method = "post">
            
        <tr>
            <td><?php echo $row['nazwa'];?></td>
            <td><?php echo $row['nazwa'];?></td>
            <td><?php echo $row['nazwa'];?></td>
            <td><?php echo $row['nazwa'];?></td>
            <td><input style ="background-color: gold;
                               width: 100px;" 
                               type = "submit" value = "REZERWUJĘ"/></td>
             <input type="hidden" value=<?php echo $row['idHotel']?> name="id"/>
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