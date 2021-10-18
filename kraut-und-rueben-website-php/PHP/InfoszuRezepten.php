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
        <p>Lass dir die Zutaten für Rezepte anzeigen!</p>
        <div class="break"></div>
        <form name="dropdown" method="GET" action="dropdown3.php">
            <select name="search">
                <option value="Bunter Salat">Bunter Salat</option>
                <option value="Tomate-Mozzarella">Tomate-Mozzarella</option>
                <option value="Orientalische Lammkoteletts">Orientalische Lammkoteletts</option>
                <option value="English Breakfast">English Breakfast</option>
                <option value="Ofengemüse">Ofengemüse</option>
            </select>
            <input type="submit" value="Los geht's" name="submit"></input>          
         </form>
</div>
    </div>
    <div class="box box2">
        <div class="multi">
        <p>Lass dir die Nährwerte anzeigen!</p>
        <div class="break"></div>
        <form name="dropdown" method="GET" action="dropdown4.php">
            <select name="search">
                <option value="Bunter Salat">Bunter Salat</option>
                <option value="Tomate-Mozzarella">Tomate-Mozzarella</option>
                <option value="Orientalische Lammkoteletts">Orientalische Lammkoteletts</option>
                <option value="English Breakfast">English Breakfast</option>
                <option value="Ofengemüse">Ofengemüse</option>
            </select>
            <input type="submit" value="Los geht's" name="submit"></input>          
         </form>
    </div>
</div>
<div class="box box5">
        <div class="multi">
        <p>Lass dir Zutaten anzeigen, die in keinem Rezept genutzt werden!</p>
        <div class="break"></div>
        <form name="dropdown" method="GET" action="ungenutztezutaten.php">
            <input type="submit" value="Los geht's" name="submit"></input>          
         </form>
</div>
    </div>


</body>
</html>

