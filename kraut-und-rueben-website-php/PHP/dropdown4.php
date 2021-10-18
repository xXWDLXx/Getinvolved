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
        
        $query = 
        "SELECT ROUND(ProtPro100,2) AS ProtPro100Dec, ROUND(CarbPro100,2) AS CarbPro100Dec, ROUND(KalPro100,2) AS KalPro100Dec, Rezeptname
            FROM(SELECT Rezeptname, SUM((Protein/grammgesamt)*100) AS ProtPro100, SUM((Carbs/grammgesamt)*100) AS CarbPro100, SUM((Kalorien/grammgesamt)*100) AS KalPro100
            FROM (SELECT r.name as Rezeptname, 
                SUM(z.protein*rz.menge) AS Protein,
                SUM(z.KOHLENHYDRATE*rz.menge) AS Carbs,
                SUM(z.KALORIEN*rz.menge) AS Kalorien,
                SUM(z.Gramm*rz.menge) AS grammgesamt
                    FROM rezepte AS r
                    INNER JOIN rezept_zutaten AS rz
                    ON rz.rezept_id=r.ID
                    INNER JOIN zutat AS z
                    ON z.zutatennr=rz.zutat_id
                    WHERE r.name= '$search'
                    GROUP BY r.name ) AS s)AS asdasd";
                 
                 


        $response = @mysqli_query($conn, $query);

        if($response){
            echo '<table align ="left"
            cellspacing="5" cellpadding="8">

            <tr>
                <td align="left"><b>Rezeptname</b></td>
                <td align="left"><b>Protein pro 100g</b></td>
                <td align="left"><b>Kohlenhydrate pro 100g</b></td>
                <td align="left"><b>Kalorien pro 100g</b></td>

            </tr>';



            while($row = mysqli_fetch_array($response)){
                echo '<tr><td align="left">' . 
                $row['Rezeptname'] . '</td><td align="left">' . 
                $row['ProtPro100Dec'] . "g" . '</td><td align="left">' . 
                $row['CarbPro100Dec'] . "g" . '</td><td align="left">' . 
                $row['KalPro100Dec'] . "kcal" . '</td><td align="left">';
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
    

