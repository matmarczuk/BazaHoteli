<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset = "utf-8"/>
	<title>Baza hoteli</title>
	<link rel = "stylesheet" href = "styles.css">
</head>
<body>
    <?php 
    require_once "../recepcja/connect.php";

    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    ?>
    <div class ="transbox">
        <form action="edytuj_pokoj.php" method="post" style="text-align: center;">
      Standard pokoju:
                       <select name="room_standard" size="1" >
                    <option>Standard</option>
                    <option>Rodzinny</option>
                    <option>Apartament</option>
                </select>
       <br><br>
            Cena za pokoj <input type="text" name = "cena_pokoju"/> PLN
      <br></br>
       <input type="SUBMIT" value="ZAPISZ"/>
       <input type="hidden" value=<?php echo $_POST['nrPokoju']?> name="nrPokoju"/>
        </form>
    </div>
     <?php if(isset($_POST['cena_pokoju']) || isset($_POST['room_standard']))
         {
         $sql = "UPDATE Pokoj SET Cena = {$_POST['cena_pokoju']},StandardPokoju_idStandardPokoju = (SELECT idStandardPokoju FROM StandardPokoju where StandardPokoju = '{$_POST['room_standard']}') WHERE nrPokoju = {$_POST['nrPokoju']};";
         echo $sql;
         if(mysqli_query($connection,$sql))
         {
             
         }
         
         }
       ?>
    
    
        <br></br>
        <form action="zmien_pokoj.php">
        <input type ="submit" style="background-color: gold; width: 300px;" value="POWRÓT DO PANELU">
    </form>
</body>
    </html>
