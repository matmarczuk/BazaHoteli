<?php 
session_start();
?>
<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset = "utf-8"/>
	<title>Wyniki wyszukiwania</title>
	<link rel = "stylesheet" href = "styles.css">

</head>
<body>
    <?php

    require_once "connect.php";
    $raz = 200;
    $obnizka = 0;
    if(isset($_POST['rabat']))
    {
    $cena = $_POST['rabat'];
    $sql = "select * from Rabat where kod = '$cena';";
    echo $sql;
    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    
    if($rezultat = @$connection->query($sql))
    {
        
        while($row = mysqli_fetch_assoc($rezultat)) 
        {
            echo $row['% Obnizki']; // Print a single column data
            $obnizka = $row['% Obnizki'];
        //echo print_r($row);       // Print the entire row data
        }
    }
    else
        echo "lipa";
    //$obnizka = (int)$rezultat['% Obnizki'];
 
    }
    
    if(isset($_POST['id']))
    {
    
    $_SESSION['search'] = $_POST['id'];
    $id = $_POST['id'];
    }
    else
    {  
        $id = $_SESSION['search'];
    } 
    
    
    echo"$id";
    
    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    if($connection->connect_errno != 0)
    {
		echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
    }
    else
    {   
            
            $sql = "SELECT * FROM Hotel WHERE idHotel = $id";
            
            if($rezultat = @$connection->query($sql))
            {

                while ($row = mysqli_fetch_assoc($rezultat))
                {   
                    //echo <?php $row['nazwa'];
                   // <div class = "transbox" style = "background-color: blue; margin-left: 150px; margin-right: 150px; transform: scale(0.85);">
                      ?> 
                      
                        <div class="transbox" style = "background-color: yellow; margin-left: 190px; margin-right: 190px; text-align:center;padding: 1px;">
                            Podsumowanie zamówienia:
                            <br></br>
                         Nazwa hotelu: <?php echo $row['nazwa'];?>    
                         <br></br>
                         Termin: 
                         <br></br>
                         Liczba osób:3453
                         <br></br>
                         Do zapłaty: <?php echo (int)$raz * (1-(int)$obnizka*0.01);?>
                         
                         
                         
                      </div>
                       <form align ="center" action = "booking.php" method = "post" >
                         <input type="text" align= "right" style = "position: static; transform: scale(0.8); border-color: red; border-width: 2px;" placeholder="Kod rabatowy" name="rabat"/>
                         <input type ="submit"  style="transform: scale(0.8); background-color: greenyellow " value="Sprawdź rabat"/>

                      </form>
                      <?php
                }

            }
    
    }
    $connection->close();
    ?>
                    
    <div class ="transbox" style = "background-color: blue; margin-left: 150px; margin-right: 150px; transform: scale(0.85);">
        
    <form align ="center" action = "booked.php" method = "post">
        Imię:
        <input class = "name" style = " width: 150px;" type="text" name = "name"/>
        Nazwisko:
	<input class = "surname" style = " width: 150px;" type="text" name = "surname"/>
	<br /> <br />
        Numer dokumentu tożsamości:
	<input class = "id_number" type="text" name = "id_number"/>
	<br /> <br />
        <div style="background-color: greenyellow; margin-bottom: 20px;border-radius: 25px;">
            <b>Adres zamieszkania:</b>
        <br /> <br />
        Ulica:
	<input class = "street" style = " width: 150px;" type="text" name = "street"/>
        Numer budynku:
	<input class = "build_num" style = " width: 50px;" type="text" name = "build_num"/>
        Kod pocztowy:
	<input class = "postcode" style = " width: 50px;" type="text" name = "postcode"/>
	<br /> <br />
        Miasto:
	<input class = "city" type="text" name = "city"/>
	<br /> <br />
        </div>
        Adres e-mail:
	<input class = "email" type="text" name = "email"/>
	<br /> <br />
        <input class = "book" type = "submit" value = "REZERWUJ"/>
        
    </form>    
    </div>
                    
               
</body>
</html>