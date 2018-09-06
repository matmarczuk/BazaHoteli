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
    
    ///////////////////////////////////////////////////
    $obnizka = 0; //nominalny rabat
    
    if(isset($_POST['rabat'])) //przypadek po kliknieciu rabatu 
    {
        $cena = $_POST['rabat'];
        $sql = "select * from Rabat where kod = '$cena';";
        $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);


        if($rezultat = @$connection->query($sql))
        {

            while($row = mysqli_fetch_assoc($rezultat)) 
            {

                $obnizka = $row['% Obnizki'];
            //echo print_r($row);       // Print the entire row data
            }
        }
        
        //$obnizka = (int)$rezultat['% Obnizki'];
         $nr_Pokoj = $_SESSION['rem_nrPokoj'];
         $idHotel = $_SESSION['rem_idHotel'];
    }
    else //otworzenie strony po raz pierszy 
    {   
    ///////////////////////

        $nr_Pokoj = $_POST['nrPokoju'];
        $idHotel = $_POST['idHotel'];
        $_SESSION['rem_nrPokoj'] = $nr_Pokoj;
        $_SESSION['rem_idHotel'] = $idHotel;
    }
    

    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    if($connection->connect_errno != 0)
    {
		echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
    }
    else
    {   
            
            $sql = "SELECT H.*, P.*  FROM Hotel AS H,Pokoj AS P WHERE idHotel = $idHotel AND nrPokoju = $nr_Pokoj; ";
            
            if($rezultat = @$connection->query($sql))
            {

                while ($row = mysqli_fetch_assoc($rezultat))
                {   
                    //echo <?php $row['nazwa'];
                   // <div class = "transbox" style = "background-color: blue; margin-left: 150px; margin-right: 150px; transform: scale(0.85);">
                      ?> 
                      
                        <div class="transbox" style = "background-color: yellow;margin-left: 280px; margin-right: 280px; text-align:center;padding: 1px;">
                            <u>Podsumowanie zamówienia:</u>
                            <br></br>
                            <b>Nazwa hotelu:</b> <?php echo $row['nazwa'];?>    
                         <br></br>
                         <b>Termin:</b> <?php echo $_SESSION['przyjazd'] ," - ", $_SESSION['wyjazd']; ?>
                         <br></br>
                         <b>Liczba osób:</b><?php echo $_SESSION['losob'];?>
                         <br></br>
                         <b>Do zapłaty:</b> <?php echo (int)$row['Cena'] * (1-(int)$obnizka*0.01), " PLN "; $_SESSION['ost_cena'] = (int)$row['Cena'] * (1-(int)$obnizka*0.01);?>
                         
                         
                         
                      </div>
                       <form align ="center" action = "booking.php" method = "post" >
                         <input type="text" align= "right" style = "position: static; transform: scale(0.8); border-color: red; width: 200px; border-width: 2px;" placeholder="Kod rabatowy" name="rabat"/>
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