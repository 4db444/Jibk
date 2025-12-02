<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        try {
            print_r(PDO::getAvailableDrivers());
            $conn = new PDO("mysql:host=localhost;dbname=jikbk", 'root', "Brahim@444");
        }catch (PDOException $e){
            
        }


    ?>
</body>
</html>