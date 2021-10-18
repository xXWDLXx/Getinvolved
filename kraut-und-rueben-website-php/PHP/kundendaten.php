
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
        <div class="boxy boxy2"> 
    
    <?php
    $button = $_GET ['submit'];
    $search = $_GET ['search'];

        require_once('dbh.php');
        
        $query = "SELECT Nachname, Vorname, Geburtsdatum, Strasse, Hausnr, PLZ, Ort, Telefon, Email FROM kunde where nachname='$search'";
        
        $response = @mysqli_query($conn, $query);

        if($response){
            echo '<table align ="left"
            cellspacing="5" cellpadding="8">

            <tr>
                <td align="left"><b>Nachname</b></td>
                <td align="left"><b>Vorname</b></td>
                <td align="left"><b>Geburtsdatum</b></td>
                <td align="left"><b>Strasse</b></td>
                <td align="left"><b>Hausnr</b></td>
                <td align="left"><b>PLZ</b></td>
                <td align="left"><b>Rezept</b></td>
                <td align="left"><b>Rezept</b></td>
                <td align="left"><b>Rezept</b></td>

              

            </tr>';



            while($row = mysqli_fetch_array($response)){
                echo '<tr><td align="left">' . 
                $row['Nachname'] . '</td><td align="left">' . 
                $row['Vorname'] . '</td><td align="left">' . 
                $row['Geburtsdatum'] . '</td><td align="left">' . 
                $row['Strasse'] . '</td><td align="left">' . 
                $row['Hausnr'] . '</td><td align="left">' . 
                $row['PLZ'] . '</td><td align="left">' . 
                $row['Ort'] . '</td><td align="left">' . 
                $row['Telefon'] . '</td><td align="left">' . 
                $row['Email'] . '</td><td align="left">';
                echo '</tr>';


            }
            echo '</table>';
        } 
        else {
            echo "Leider ergab deine Suche keine Treffer!";
           
        }
        mysqli_close($conn);
    ?>
</div>
    </div>
    </body>
    </html>
    

