<?php
    include_once "dbh.php";
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style7.css">

<head>
    <title>Kraut und Rüben</title>
    <link rel="stylesheet" href="style8.css">
</head>
<body>
    
<a href=index.php><img src="kraut_und_rueben.png" class="krautlogo"></a>
    


<div class="grid2x2">



    <div class="box box1">
        <div class="multi">
        <p>Hier kannst du einfache Rezepte finden!</p>
        <div class="break"></div>
        <form name="dropdown" method="GET" action="dropdown.php">
            <select name="search">
                <option value="allesfresser">egal</option>
                <option value="vegan">vegan</option>
                <option value="vegetarisch">vegetarisch</option></select>

            <select name="searchx">
                <option value="allesfresser">egal</option>
                <option value="glutenfrei">glutenfrei</option>
                <option value="laktosefrei">laktosefrei</option></select>
    
            <input type="number" placeholder="Anzahl der Zutaten" name="searchy" required>
            <input type="submit" value="Los geht's" name="submit"></input>
        </form>
    </div>
    </div>

   


    <div class="box box2">
    
        <div class="multi">
            <p>Hier kannst du Rezepte nach Zutat suchen!</p>
            <div class="break"></div>
                <form name="searchzutat" method="get" action="nachzutat.php">
                    <input type="text" placeholder="Zutat eingeben" name="search" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
                </div>
    </div>

    <div class="box box3">
    <div class="multi">
                <p>Hier kannst du Rezepte nach Kalorien suchen!</p>
                <div class="break"></div>
                <form name="searchkalorien" method="get" action="nachkalorien.php">
                    <input type="text" placeholder="Max. Kalorien eingeben" name="search" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
        </div>
        </div>


        <div class="box box4">
        <div class="multi">
            <p>Für die Gains: Suche Rezepte nach Proteingehalt!</p>
            <div class="break"></div>
            <form name="dropdown" method="GET" action="dropdown2.php">
                <select name="search">
                    <option value="allesfresser">egal</option>
                    <option value="vegan">vegan</option>
                    <option value="vegetarisch">vegetarisch</option></select>
                    
                    <input type="number" placeholder="Min. Proteingehalt" name="searchy" required>

                
                <input type="submit" value="Los geht's" name="submit"></input>
            </form>
        </div>
</div>
</form>
</div>

</body>
</html>

