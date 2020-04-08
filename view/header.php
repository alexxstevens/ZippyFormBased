<!DOCTYPE html>
<html lang="en">

<!-- the head section -->
<head>
    <title>Zippy's Used Auto</title>
    <link rel="icon" href="../../images/logo.png" type="image/icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Monoton|Orbitron:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>

<!-- the body section -->
<body>
    
<?php 
session_start()

?>
    <header>
        <div id="header">
            <span id="heading"><a href="index.php"><h1 id="head">Zippy's Used Auto Inventory</h1></a></span><br><br>
             <nav>    
                <ul class="nav nav-tabs" id="navList">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <?php 
                    if(!isset($_SESSION['firstName'])) {?>
                    <a class="nav-link" href="register.php">Register</a> 
                </li>
                </ul>
            </nav>
        </div>
    </header> 
                    <?php 
                    } else { ?><a class="nav-link" href="logout.php"> Sign Out</a><?php }?>
                </li>
                </ul>
                
            </nav>
        </div>
    </header>


