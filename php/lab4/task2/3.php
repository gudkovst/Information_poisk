<html> <head>
<title> Content of table notebook </title> </head> <body>

<?php

    function vid_content(&$dberror){
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

        print "<h4>Content of table notebook";
        $result = mysqli_query($conn, "SELECT * FROM notebook");
        $num_fields = mysqli_num_fields($result);
        print "<p><table style='border: 10'>\n";
        print "<tr>\n";
        for ($x = 0; $x < $num_fields; $x++) {
            $name = mysqli_fetch_field_direct($result, $x)->name;
            print "\t<th>$name</th>\n";
        }
        print "</tr>\n";
        while ($a_row = mysqli_fetch_row($result)){
            print "<tr>\n";
            foreach ($a_row as $field)
                print "\t<td>$field</td>\n";
            print "</tr>\n";
        }
        print "</table>\n";
        return true;
    }
    
    $dberror = "";
    vid_content($dberror) or die("Error: $dberror<br>");
?>
</body> </html>