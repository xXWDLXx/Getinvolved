


                  
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="style8.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <div class="grid1x1">
        <div class="boxy boxy1">
    
    <?php
    $button = $_GET ['submit'];
    $search = $_GET ['search'];

        require_once('dbh.php');
        
        $query = "SELECT Bestellnr, Bestelldatum, Vorname, Nachname 
        FROM bestellung NATURAL JOIN kunde 
        WHERE Nachname = '$search'";
        $response = @mysqli_query($conn, $query);

        if($response){
            echo '<table align ="left"
            cellspacing="5" cellpadding="8">

            <tr>
                <td align="left"><b>Bestellnummer</b></td>
                <td align="left"><b>Bestelldatum</b></td>
                <td align="left"><b>Vorname</b></td>
                <td align="left"><b>Nachname</b></td>

            </tr>';



            while($row = mysqli_fetch_array($response)){
                echo '<tr><td align="left">' . 
                $row['Bestellnr'] . '</td><td align="left">' .
                $row['Bestelldatum'] . '</td><td align="left">' .
                $row['Vorname'] . '</td><td align="left">' .
                $row['Nachname'] . '</td><td align="left">';
                

                echo '</tr>';


            }
            echo '</table>';
        } 
        else {
            echo "Diese Zutat haben wir leider nicht gefunden. Versuche es im Singular!";
           
        }
        mysqli_close($conn);
    ?>
    </div>
    </div>

    </body>
    </html>
    

