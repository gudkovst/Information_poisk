<html> <head>
<title> Работа с ассщциативными массивами. </title> 
</head> <body>

<?php
    function print_array($arr) {
        foreach ($arr as $key=>$val){
            print "$key:  $val<br>";
        }
        print "<br>";
    }

    $cust = array('cnum' => 2001, 
                  'cname' => "Hoffman",
                  'city' => "London",
                  'snum' => 1001,
                  'rating' => 100);
    print_array($cust);

    asort($cust);
    print_array($cust);

    ksort($cust);
    print_array($cust);

    sort($cust);
    print_array($cust);
?>

</body> </html>