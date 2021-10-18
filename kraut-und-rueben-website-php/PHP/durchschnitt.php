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
        
        $query = "SELECT ROUND(Durchschnittkal, 2) AS DurchSchnittKalDec, ROUND(DurchSchnittKohl,2) AS DurchSchnittKohlDec, ROUND(DurchSchnittProt,2) AS DurchSchnittProtDec, NAMEFINAL
        FROM
        (SELECT SUM(YAYA/YOYO) AS DurchSchnittKal, SUM(YEYE/YOYO) AS DurchSchnittKohl, SUM(YUYU/YOYO) AS DurchSchnittProt, NAMEFINAL
        FROM
        (SELECT finalbest.AnzahlBest AS YOYO, finalkal.kalogesamt AS YAYA, finalkohl.kohlgesamt AS YEYE, finalprot.protgesamt AS YUYU, finalbest.nachname AS NAMEFINAL  FROM
        
        (SELECT final2.AnzahlBest, final2.bzfinal, final2.nachname FROM
        (SELECT COUNT(FINAL) as AnzahlBest, bzfinal, asd.nachname
        FROM
        (SELECT b.BESTELLNR AS FINAL, bz.bestellnr AS bzfinal, k.NACHNAME
        FROM bestellung AS b
        inner JOIN bestellungzutat AS bz
        on b.BESTELLNR=bz.BESTELLNR
        inner JOIN zutat AS z
        on z.ZUTATENNR=bz.ZUTATENNR
        INNER JOIN kunde AS k
        ON k.kundennr=b.KUNDENNR
        WHERE k.NACHNAME='$search'
        GROUP BY b.bestellnr) AS asd) AS final2) AS finalbest
        
        INNER JOIN
        (SELECT final.kalogesamt, final.bestellnr
        FROM
        (SELECT SUM(bz.MENGE*z.kalorien) AS kalogesamt, b.bestellnr, k.nachname
        FROM bestellung AS b
        inner JOIN bestellungzutat AS bz
        on b.BESTELLNR=bz.BESTELLNR
        inner JOIN zutat AS z
        on z.ZUTATENNR=bz.ZUTATENNR
        INNER JOIN kunde AS k
        ON k.kundennr=b.KUNDENNR
        WHERE k.NACHNAME='$search'
        GROUP BY b.KUNDENNR) AS final) AS finalkal
        
        INNER JOIN
        (SELECT final2.kohlgesamt, final2.bestellnr
        FROM
        (SELECT SUM(bz.MENGE*z.kohlenhydrate) AS kohlgesamt, b.bestellnr
        FROM bestellung AS b
        inner JOIN bestellungzutat AS bz
        on b.BESTELLNR=bz.BESTELLNR
        inner JOIN zutat AS z
        on z.ZUTATENNR=bz.ZUTATENNR
        INNER JOIN kunde AS k
        ON k.kundennr=b.KUNDENNR
        WHERE k.NACHNAME='$search'
        GROUP BY b.KUNDENNR) AS final2) AS finalkohl
        
        INNER JOIN
        (SELECT final3.protgesamt, final3.bestellnr
        FROM
        (SELECT SUM(bz.MENGE*z.protein) AS protgesamt, b.bestellnr
        FROM bestellung AS b
        inner JOIN bestellungzutat AS bz
        on b.BESTELLNR=bz.BESTELLNR
        inner JOIN zutat AS z
        on z.ZUTATENNR=bz.ZUTATENNR
        INNER JOIN kunde AS k
        ON k.kundennr=b.KUNDENNR
        WHERE k.NACHNAME='$search'
        GROUP BY b.KUNDENNR) AS final3) AS finalprot) AS rerere) AS asd";
        $response = @mysqli_query($conn, $query);

        if($response){
            echo '<table align ="left"
            cellspacing="5" cellpadding="8">

            <tr>
                <td align="left"><b>Kunde</b></td>
                <td align="left"><b>durchschn. Kalorien</b></td>
                <td align="left"><b>durchschn. Kohlenhydrate</b></td>
                <td align="left"><b>durchschn. Proteine</b></td>

            </tr>';



            while($row = mysqli_fetch_array($response)){
                echo '<tr><td align="left">' . 
                $row['NAMEFINAL'] . '</td><td align="left">' .
                $row['DurchSchnittKalDec'] . '</td><td align="left">' .
                $row['DurchSchnittKohlDec'] . '</td><td align="left">' .
                $row['DurchSchnittProtDec'] . '</td><td align="left">';
                

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
    

