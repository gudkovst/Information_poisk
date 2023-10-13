
<?php

    $mysql_user = "root";  
    $conn = mysqli_connect("localhost", $mysql_user, ""); 
    if (!$conn ) die("no connection with MySQL");

    $database = "infopoisk_php";

    mysqli_select_db($conn, $database)
        or die ("Cannot open $database");

    return $conn;

?>
