<html> <head>
<title> Create table notebook </title> </head> <body>

<?php

    $mysql_user = "root";  
    $conn = mysqli_connect("localhost", $mysql_user, ""); 
    if (!$conn) die("no connection with MySQL");

    $database = "infopoisk_php";

    mysqli_select_db($conn, $database) or die("Cannot open $database");

    $pre_query = "DROP TABLE IF EXISTS notebook";
    mysqli_query($conn, $pre_query) or die("<p>Error drop: ".mysqli_error());

    $create_query = "CREATE TABLE notebook (id INT PRIMARY KEY AUTO_INCREMENT,
    									    name VARCHAR(50) NOT NULL,
    									    city VARCHAR(50),
    									    address VARCHAR(50),
    									    birthday DATE,
    									    mail VARCHAR(20) NOT NULL)";
    mysqli_query($conn, $create_query) or die("<p>Error create: ".mysqli_error());
    mysqli_close($conn);
?>

</body> </html>
