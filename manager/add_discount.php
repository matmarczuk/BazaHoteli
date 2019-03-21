<!DOCTYPE HTML>
<html lang = "pl">
<head>
	<meta charset = "utf-8"/>
	<title>Baza hoteli</title>
	<link rel = "stylesheet" href = "styles.css">
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
                <th>KOD</th>
                <th>Obnizka</th>
                <th>Rozpoczecie</th>
                <th>Zakonczenie</th>
            </style>
        </thead>
        
    <?php 

   
    require_once "../reception/connect.php";

    $connection = @new mysqli($host, $db_user, $db_password,$db_name, 3306, $socket);
    
    if(isset($_POST['kod']))
    {   $sql = "INSERT INTO Rabat VALUES('{$_POST['kod']}',{$_POST['procent']},NULL,'{$_POST['od']}','{$_POST['do']}',1);";
         if(mysqli_query($connection,$sql))
         {
             
         }
    }
    
    $now = date("Y-m-d");
    $sql = "SELECT * FROM Rabat WHERE data_zakonczenia>'{$now}' ORDER BY data_rozpoczecia ;";
    if($connection->connect_errno != 0)
    {
            echo "Error".$connection->connect_errno."Opis: ".$connection->connect_error;	
    }
    else
    {

        ?><tbody><?php
    //$sql = "SELECT * FROM Hotel WHERE lokalizacja = '$place'";

        if($rezultat = @$connection->query($sql))
        {

            while ($row = mysqli_fetch_assoc($rezultat))
            {   ?>
            <tr height="50">
            <td><?php echo $row['kod']; ?></td> 
            <td><?php echo $row['% Obnizki'] ," % " ?></td>
            <td><?php echo $row['data_rozpoczecia'];?></td>
            <td><?php echo $row['data_zakonczenia'];?></td>
            </tr>
                <?php
            }

        }

    }

    ?>
        </tbody>
     </table>
    <div class ="transbox" align = "center" >
        <form action ="add_discount.php" method="post">
            KOD:
            <input type="text" placeholder="KOD" name="kod"/>
            <br></br>
            Data rozpoczecia: &nbsp;  &nbsp; Data zakonczenia:
                        <br></br>

            <input type="date" name="od"/>
            
            <input type="date" name="do"/>
                        <br></br>
                        <input type="text" name="procent" style="width: 50px;"> %
                        <br></br>
            <input type ="submit" value="DODAJ NOWY RABAT">
        </form>
    </div>
    <br></br>
    <form action="index.php">
        <input type ="submit" style="background-color: gold; width: 300px;" value="POWRÓT DO PANELU">
    </form>
    
</body>
</html>
