<!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="style8.css">
        
    <head>
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
        
        $query = "SELECT z.bezeichnung AS zutat, rz.menge as menge, z.einheit as einheit
        FROM rezepte AS r
        INNER JOIN rezept_zutaten AS rz
        ON rz.rezept_id=r.ID
        INNER JOIN zutat AS z
        ON z.zutatennr=rz.zutat_id
        WHERE r.name = '$search' ";


        $response = @mysqli_query($conn, $query);

        if($response){
            echo '<table align ="left"
            cellspacing="5" cellpadding="8">

            <tr>
                <td align="left"><b>Zutat</b></td>
                <td align="left"><b>Menge</b></td>
                <td align="left"><b>Einheit</b></td>

            </tr>';



            while($row = mysqli_fetch_array($response)){
                echo '<tr><td align="left">' . 
                $row['zutat'] . '</td><td align="left">' . 
                $row['menge'] . '</td><td align="left">' . 
                $row['einheit'] . '</td><td align="left">';
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
    

