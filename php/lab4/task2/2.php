<html> <head>
<title> Insert to table notebook </title> </head> <body>

<?php

    function Add_to_database($name, $sity, $address, $birthday, $mail, &$dberror){
        $mysql_user = "root";
        $conn = mysqli_connect("localhost", $mysql_user, ""); 
        if (!$conn) {
            $dberror = "no connection with MySQL";
            return false;
        }

        $database = "infopoisk_php";
        if (!mysqli_select_db($conn, $database)) {
            $dberror = mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }

        $query = "INSERT INTO notebook VALUES(0, '$name', '$sity', '$address', '$birthday', '$mail')";
        if (!mysqli_query($conn, $query)) {
            $dberror = "<p>Error insert: ".mysqli_error($conn);
            mysqli_close($conn);
            return false;
        }
        mysqli_close($conn);
        return true;
    }

    function Write_form(){
        print "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
        print "<p>Enter surname and name[*]: \n";
        print "<input type='text' name='name'> ";
        print "<p>Enter sity: \n";
        print "<input type='text' name='sity'> ";
        print "<p>Enter address: \n";
        print "<input type='text' name='address'> ";
        print "<p>Enter birthday (YYYY-MM-DD): \n";
        print "<input type='text' name='birthday'> ";
        print "<p>Enter e-mail[*]: \n";
        print "<input type='text' name='mail'> ";
        print "<p><input type='submit' value='INSERT!'>\n</form>\n";
        print "<p>Fields marked * are required!";
    }
    
    $PARAMS = (!empty($_POST))? $_POST : $_GET;
    if (!empty($PARAMS['name']) && !empty($PARAMS['mail'])){
        $dberror = "";
        $ret = Add_to_database($PARAMS['name'], $PARAMS['sity'], $PARAMS['address'], $PARAMS['birthday'], $PARAMS['mail'], $dberror);
        if (!$ret) {
            print "Error: $dberror<br>";
        }
        else {
            print "Inserted<br>";
            print "<a href=\"2.php\"> Insert again!</a>";
        }
    }
    else Write_form();
?>
</body> </html>