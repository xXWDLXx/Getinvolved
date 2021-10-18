
<?php
    include_once "dbh.php";
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style8.css">

<head>
    <title>Kraut und Rüben</title>
</head>
<body>


    
        <div class="logo">
            <a href=index.php><img src="kraut_und_rueben.png" class="krautlogo"></a>
        </div>

<div class="grid2x2"> 

    <div class="box box1">
        <div class="multi">
        <p>Hier findest du den richtigen Lieferanten!</p>
            <div class="break"></div>
                <form name="searchlieferant" method="get" action="lieferantfinden.php">
                    <input type="text" placeholder="Zutat eingeben" name="search" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
</div>
    </div>
    <div class="box box2">
        <div class="multi">

        <p>Hier kannst du überprüfen, ob es kritische Bestände gibt!</p>
            <div class="break"></div>
                <form name="searchbestand" method="get" action="bestandfinden.php">
                    <input type="number" placeholder="Max. Bestand angeben" name="search" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
    </div>
</div>


</body>
</html>















