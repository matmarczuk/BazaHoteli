<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset = "utf-8"/>
	<title>Baza hoteli</title>
	<link rel = "stylesheet" href = "styles.css">
</head>
<body>
    
    
     <?php 
    require_once "../connect.php";

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
        <form action="change_room.php" method="post" style="text-align: center; transform: scale(0.85);"> 
       Wybierz hotel: <select name="hotel" size="1"> <?php
            while ($row = mysqli_fetch_assoc($rezultat))
            {   ?>
       
                    <option><?php echo $row['nazwa']; ?></option>
                    
                   <?php 
                   
            }
            
        }
    }?>
                </select>
       &nbsp;  &nbsp;
       <input type="SUBMIT" value="Pokaz pokoje w hotelu"/>
        </form>
    </div>
    
    <br></br>
    <?php
    
    if(isset($_POST['hotel']))
    {
         if($connection->connect_errno != 0)
        {
                echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
        }
        else
        {     
                    $sql ="SELECT Pokoj.*, Pietro.ktorePietro FROM Pokoj JOIN Pietro ON Pokoj.Pietro_idPietro = Pietro.idPietro JOIN Hotel ON Pietro.Hotel_idHotel=Hotel.idHotel WHERE Hotel.nazwa = '{$_POST['hotel']}';";
                   
                    if($rezultat = @$connection->query($sql))
                    {   ?>
                            
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
                                       <th>Numer pokoju</th>
                                       <th>Numer pietra</th>
                                       <th>Cena za pokój</th>
                                   </tr>
                                   </style>
                               </thead>
                               
                           <tbody>
                         <?php
                        while ($row = mysqli_fetch_assoc($rezultat))
                        {       ?>
                           <form action="edit_room.php" method="post">
                               <tr>
                                           <td><?php echo $row['nrPokoju'];?></td>
                                           <td><?php echo $row['ktorePietro'];?></td>
                                           <td><?php echo $row['Cena'];?></td>
            <td><input style ="background-color: gold;
                               width: 100px;" 
                               type = "submit" value = "ZMIEŃ"/></td>
             <input type="hidden" value=<?php echo $row['nrPokoju']?> name="nrPokoju"/>
                            </tr>
                            </form>
                            <?php
                        }
                    }
        
           
    
        }
        
    }
    ?>
                            </tbody>
                            </table>
                            
    <br></br>
        <form action="index.php">
        <input type ="submit" style="background-color: gold; width: 300px;" value="POWRÓT DO PANELU">
    </form>
    
    
</body>
</html>
