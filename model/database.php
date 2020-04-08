<?php
    //local development server connection
    // $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    // $username = 'root';
    //$password = 'pa55word';

    // Heroku connection
    $dsn = 'mysql:host=kil9uzd3tgem3naa.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=p0cky0p5l6tghder';
    $name = 'heccedejen5tm9p9';
    $pa55word = 's06uh7v07t8s4uxm';

    try {
        $db = new PDO($dsn, $name, $pa55word);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
