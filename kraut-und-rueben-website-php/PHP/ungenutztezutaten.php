
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

        require_once('dbh.php');
        
        $query = "SELECT
        z.BEZEICHNUNG AS Zutat, z.bestand as Bestand
        FROM
        rezept_zutaten rzz
        right JOIN
        zutat z ON (rzz.Zutat_ID = z.ZUTATENNR)
        WHERE rzz.Zutat_ID is Null and z.ZUTATENNR IS NOT NUll";
        
        $response = @mysqli_query($conn, $query);

        if($response){
            echo '<table align ="left"
            cellspacing="5" cellpadding="8">

            <tr>
                <td align="left"><b>Rezept</b></td>
                <td align="left"><b>Bestand</b></td>
              

            </tr>';



            while($row = mysqli_fetch_array($response)){
                echo '<tr><td align="left">' . 
                $row['Zutat'] . '</td><td align="left">' . 
                $row['Bestand'] . '</td><td align="left">';
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
    

