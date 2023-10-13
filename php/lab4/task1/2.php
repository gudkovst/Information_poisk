<html> <head>
<title> Show structure and data of tables </title>
</head> <body>

<?php
	$PARAMS = (!empty($_POST))? $_POST : $_GET;
    $structure = (!empty($PARAMS["structure"]))? $PARAMS["structure"] : array();
    $content = (!empty($PARAMS["content"]))? $PARAMS["content"] : array();

	include("3.inc"); // styles CSS
	$conn = include("4.inc"); //connect to DB
	include("5.inc"); //show structure and data of tables
	include("6.inc"); //disconnect DB
?>

</body></html>