<?php 
require_once 'config.php';
$pdo = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
$query = 'SELECT * FROM liste';
$statement = $pdo->query($query);
$list = $statement->fetchAll(PDO::FETCH_ASSOC); 


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="courses.css" rel="stylesheet">
</head>
<body>
    <h1> COURSES </h1>
    <main>
    
    <?php
    foreach($list as $item){
        $required = "content";
        if($item["besoin"] === 0) {
            $required = "contentMasked";
        } else {
            $required = "content";
        }
        ?>

        <div class="container">
            <div class="<?= $required ?>">
                <p><?=$item['name']?></p>
                <p><?=$item['quantity']?></p>
            </div>
        </div>
    <?php
    }
    ?>
    </main>
    
</body>
</html>

