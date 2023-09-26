<html> <head>
<title> Game: "Cities and monuments" </title> 
</head> <body>

<?php
    $PARAMS = (!empty($_POST))? $_POST : $_GET;
    $otv = $PARAMS["otv"];
    $true_otv = array("6","9","4","1","3","2","5","8","7");
    $count = 0;
    for ($i = 0; $i < count($otv); $i++)
        $count += ($otv[$i] == $true_otv[$i]);
    
    print "<p>".$PARAMS["user"].", your result: ".$count."</p>";
    switch ($count) {
        case 9:
            print "<p>You know geography capitally</p>";
            break;
        case 8:
            print "<p>You know geography exellent</p>";
            break;
        case 7:
            print "<p>You know geography very well</p>";
            break;
        case 6:
            print "<p>You know geography well</p>";
            break;
        case 5:
            print "<p>You know geography satisfactorily</p>";
            break;
        case 4:
            print "<p>You know geography enough</p>";
            break;
        case 3:
            print "<p>You don't know geography well</p>";
            break;
        case 2:
            print "<p>You know very little geography</p>";
            break;
        default:
            print "<p>You don't know geography at all</p>";
            break;
    }

?>

</body> </html>