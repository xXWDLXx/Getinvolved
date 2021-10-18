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
            <div class="Deleted">

   
    <?php
    $button = $_GET ['submit'];
    $search = $_GET ['search'];
    $searchy = $_GET ['searchy'];

        require_once('dbh.php');
        
        $query = "DELETE FROM KUNDE where Nachname='$search' and Vorname='$searchy'";
        $response = @mysqli_query($conn, $query);

        if($response){
            echo '<a>Nutzerdaten wurden erfolgreich entfernt!</a>';
        };

    
       
        mysqli_close($conn);
    ?>
    </div>
</div>
    </div>
    </body>
    </html>
    

