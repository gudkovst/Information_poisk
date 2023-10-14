<html> <head>
<title> Insert to table notebook </title> </head> <body>

<?php

    function Add_to_database($conn, $name, $sity, $address, $birthday, $mail){
        
        $query = "INSERT INTO notebook VALUES(0, '$name', '$sity', '$address', '$birthday', '$mail')";
        if (!mysqli_query($conn, $query))
            print "Error insert: ".mysqli_error($conn)."<br> durind $query<br>";
    }

    $mysql_user = "root";
    $conn = mysqli_connect("localhost", $mysql_user, ""); 
    if (!$conn ) die("no connection with MySQL");

    $database = "infopoisk_php";
    mysqli_select_db($conn, $database) or die("Cannot open $database");

    Add_to_database($conn, 'Ivanov Ivan', 'Irkutsk', 'Libknehta, 18', '1958-02-01', 'iv@irk.su');
    Add_to_database($conn, 'Petrov Petr', 'Petropavlovsl', 'Engelsa, 19', '1972-08-10', 'pet@pet.su');
    Add_to_database($conn, 'Glebov Lev', 'Berlin', 'Strasse, 26', '1899-03-05', 'mash@rus.su');
    mysqli_close($conn);
?>
</body> </html>