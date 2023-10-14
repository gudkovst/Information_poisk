<html> <head>
<title> Update table notebook </title> </head> <body>

<?php

    function vid_content($conn){
        print "<h4>Content of table notebook";
        $result = mysqli_query($conn, "SELECT * FROM notebook");
        $num_fields = mysqli_num_fields($result);
        print "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
        print "<p><table style='border: 10'>\n";
        print "<tr>\n";
        for ($x = 0; $x < $num_fields; $x++){
            $name = mysqli_fetch_field_direct($result, $x)->name;
            print "\t<th>$name</th>\n";
        }
        print "\t<th>Update</th>\n";
        print "</tr>\n";
        while ($a_row = mysqli_fetch_row($result)){
            print "<tr>\n";
            foreach ($a_row as $field)
                print "\t<td>$field</td>\n";
            print "\t<td><input type=\"radio\" name=\"id\" value=\"$a_row[0]\"></td>\n";
            print "</tr>\n";
        }
        print "</table>\n";
        print "<p><input type='submit' value='Update'>\n</form>\n";
    }

    function vid_update($conn, $id){
        print "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
        print "<select name=\"field_name\">";
        $result = mysqli_query($conn, "SELECT * FROM notebook WHERE id = $id");
        $num_fields = mysqli_num_fields($result);
        $a_row = mysqli_fetch_row($result);
        for ($i = 1; $i < $num_fields; $i++){
            $name = mysqli_fetch_field_direct($result, $i)->name;
            print "<option value=\"$name\">$a_row[$i]";
        }
        print "</select>";
        print "<p>Enter new value:\n<input type=\"text\" name=\"field_value\"></p>";
        print "<input type='hidden' name='id' value=$id>";
        print "<p><input type='submit' value='Replace'>\n</form>\n";
    }

    function update($conn, $id, $field_name, $field_value){
        mysqli_query($conn, "UPDATE notebook SET $field_name = '$field_value' WHERE id = $id");
        print "<p>Updated! Select next action:</p>";
        print "<a href=\"3.php\"> Show table</a><br>";
        print "<a href=\"4.php\"> Update again</a>";
    }
    
    $mysql_user = "root";
    $conn = mysqli_connect("localhost", $mysql_user, ""); 
    if (!$conn) 
        die("no connection with MySQL");

    $database = "infopoisk_php";
    if (!mysqli_select_db($conn, $database)) 
        die(mysqli_error($conn));
    vid_content($conn);

    $PARAMS = (!empty($_POST))? $_POST : $_GET;
    if (!empty($PARAMS['id'])){
        if (!empty($PARAMS['field_name']))
            update($conn, $PARAMS['id'], $PARAMS['field_name'], $PARAMS['field_value']);
        else
            vid_update($conn, $PARAMS['id']);
    }
?>
</body> </html>