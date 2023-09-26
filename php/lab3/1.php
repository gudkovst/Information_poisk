<html> <head>
<title> Обработка формы 1 </title> 
</head> <body>

<?php
    $PARAMS = (!empty($_POST))? $_POST : $_GET;
    $align = $PARAMS["align"];
    $valign = $PARAMS["valign"][0];

    print "<p><table border=1 width=100 height=100>\n";

    print "<tr><td align=$align valign=$valign>Text</td></tr></table></p>\n";

    print "<p><a href='1.html'>return</a></p>";
?>

</body></html>