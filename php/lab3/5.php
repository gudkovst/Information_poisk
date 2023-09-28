<?php

$list_sites = array("www.yandex.ru", "www.rambler.ru", "www.google.com", "www.yahoo.com", "www.altavista.com");

if (!empty($_POST["site"])) {
    $site = $_POST["site"];
    header("Location: http://$site");
    exit;
}
else { // начало блока else
?>

<html> <head>
<title> Go to selected site </title> </head> <body>

<?php

print "<form action='{$_SERVER['PHP_SELF']}' method='post'>";

?>

<select name="site">
    <option value="">Search engines:
    <?php
        foreach ($list_sites as $site) 
             print "<option value=\"$site\">$site\n";
    ?>
</select>
<input type="submit" value="Go">
</form>

<?php
     } // конец блока else
?>
</body> </html>