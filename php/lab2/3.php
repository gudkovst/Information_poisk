<html> <head>
<title> Используя вложенные циклы while, отобразите на экране таблицу Пифагора 10×10 (т.е. таблицу умножения чисел от 1 до 10). При этом фон диагональных ячеек должен быть того цвета, который задается вне циклов. Ширина рамки таблицы равна 1, отступ содержимого ячеек от границы равен 5. </title> 
</head> <body>

<?php
    define("COLUMNS", "10");
    define("STRINGS", "10");
    $color_diag = "aqua";
    $color = "white";
    print "<table border=1 cellpadding=5>\n";
    $col = 1;
    $str = 1;
    while ($col <= COLUMNS) {
        print "<tr>\n";
        while ($str <= STRINGS) {
            $style = ($str == $col)? "style=\"background-color:$color_diag\"" : "style=\"background-color:$color\"";
            print "\t<td ".$style." >";
            print $col * $str;
            print "</td>\n";
            $str++;
        }
        print "</tr>\n";
        $str = 1;
        $col++;
    }
    print "</table>";
?>

</body> </html>