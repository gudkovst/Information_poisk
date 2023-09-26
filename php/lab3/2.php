<html> <head>
<title> Обработка формы 1 сразу </title> 
</head> <body>

<?php
    $PARAMS = (!empty($_POST))? $_POST : $_GET;
    $align = (isset ($PARAMS["align"]))? $PARAMS["align"] : "left";
    $valign = (isset($PARAMS["valign"]))? $PARAMS["valign"][0] : "top";

    print "<p><table border=1 width=100 height=100>\n";

    print "<tr><td align=$align valign=$valign>Text</td></tr></table></p>\n";

    print "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
?>

<p><b>Select horizontal align</b></p>
<p><input type="radio" name="align" value="left">left</p>
<p><input type="radio" name="align" value="center">center</p>
<p><input type="radio" name="align" value="right">right</p>

<p><b>Select vertical align</b></p>
<p><input type="checkbox" name="valign[]" value="top">top</p>
<p><input type="checkbox" name="valign[]" value="middle">middle</p>
<p><input type="checkbox" name="valign[]" value="bottom">bottom</p>

<p><input type="submit" value="Exec"></p>
</form>

</body></html>