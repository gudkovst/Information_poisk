<html> <head>
<title> Работа с массивами. </title> 
</head> <body>

<?php
    function print_array($arr) {
        foreach ($arr as $a)
            print $a."&nbsp&nbsp";
        print "<br><br>";
    }

    define("SIZE", "10");

    for ($i = 1; $i <= SIZE; $i++)
        $treug[$i - 1] = $i * ($i + 1) / 2;
    print_array($treug);

    for ($i = 1; $i <= SIZE; $i++)
        $kvd[$i - 1] = $i * $i;
    print_array($kvd);

    $res = array_merge($treug, $kvd);
    print_array($res);

    sort($res);
    print_array($res);

    array_shift($res);
    print_array($res);

    $res1 = array_unique($res);
    print_array($res1);
?>

</body> </html>