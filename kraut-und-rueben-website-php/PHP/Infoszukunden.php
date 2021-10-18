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
            <p>Hier kannst du Bestellungen suchen!</p>
            <div class="break"></div>
                <form name="searchbestellung" method="get" action="bestellungfinden.php">
                    <input type="text" placeholder="Nachname des Kunden" name="search" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
        </div>    
    </div>        
   
        <div class="box box2">
        <div class="multi">
            <p>Hier kannst du Kundendaten einsehen!</p>
            <div class="break"></div>
                <form name="searchbestellung" method="get" action="Kundendaten.php">
                    <input type="text" placeholder="Nachname des Kunden" name="search" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
        </div>    
    </div>  
    <div class="box box3">
        <div class="multi">
            <p>Hier kannst du Kundendaten löschen!</p>
            <div class="break"></div>
                <form name="searchbestellung" method="get" action="deleteuser.php">
                    <input type="text" placeholder="Nachname des Kunden" name="search" required>
                    <input type="text" placeholder="Nachname des Kunden" name="searchy" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
        </div>    
    </div>         
    <div class="box box4">
        <div class="multi">
            <p>Hier kannst du durchschnittlichen Nährwerte aller Bestellungen eines Kunden ansehen!</p>
            <div class="break"></div>
                <form name="searchbestellung" method="get" action="durchschnitt.php">
                    <input type="text" placeholder="Nachname des Kunden" name="search" required>
                    <input type="submit" value="Los geht's" name="submit"></input>
                </form>
        </div>    
    </div>      
    
</div>
<!-- DSGVO
    DURCHSCHN. NÄHRTWERTE PRO BESTELLUNG
-->


</body>
</html>

