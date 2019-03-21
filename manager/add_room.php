<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset = "utf-8"/>
	<title>Baza hoteli</title>
	<link rel = "stylesheet" href = "styles.css">
</head>
<body>
    <?php 
    require_once "../reception/connect.php";

    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    ?>
    <div class ="transbox">
    <?php
    
    if($connection->connect_errno != 0)
    {
            echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
    }
    else
    {     
    $sql = "SELECT * FROM Hotel;";

        if($rezultat = @$connection->query($sql))
        {
            ?>
        <form action="add_room.php" method="post" style="text-align: center; transform: scale(0.85);"> 
       Wybierz hotel: <select name="hotel" size="1"> <?php
            while ($row = mysqli_fetch_assoc($rezultat))
            {   ?>
       
                    <option><?php echo $row['nazwa']; ?></option>
                    
                   <?php 
                   
            }
            
        }
    }?>
                </select>
      <br><br/>
      Numer pokoju <input type="text" name = "numer_pokoju" style="width: 30px;"/> 
       <br><br/>
      Numer pietra <input type="text" name = "numer_pokoju" style="width: 30px;"/> 
       <br><br/>
       Standard pokoju:
                       <select name="room_standard" size="1" >
                    <option>Standard</option>
                    <option>Rodzinny</option>
                    <option>Apartament</option>
                </select>
       <br><br>
       Widok z okna:                        
       <select name="widok" size="1" >
                    <option> Widok na jezioro </option>
                    <option>Widok na góry</option>    
                    <option>Widok na miasto</option>  
                    <option>Widok na morze </option>
                </select>
       <br><br>
       
      Cena za pokoj <input type="text" name = "cena_pokoju"/> PLN
      <br></br>
       <input type="SUBMIT" value="ZAPISZ"/>
        </form>
    </div>
    <br></br>
        <form action="index.php">
        <input type ="submit" style="background-color: gold; width: 300px;" value="POWRÓT DO PANELU">
    </form>
</body>
</html>

