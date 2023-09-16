<html> <head>
<title> Используя вложенные циклы for отобразите на экране таблицу сложения чисел от 1 до 10. При этом цвет цифр в верхней строке и левом столбце должен быть задан через $color вне циклов, а в левой верхней ячейке должен стоять знак "+" красного цвета. Ширина рамки таблицы равна 1, отступ содержимого ячеек от границы равен 5. </title> 
</head> <body>

<?php
    define("COLUMNS", "10");
    define("STRINGS", "10");
    $color_plus = "red";
    $color_line = "blue";
    print "<table border=1 cellpadding=5>\n";
    for ($col = 1; $col <= COLUMNS; $col++){
        print "<tr>\n";
        for ($str = 1; $str <= STRINGS; $str++){
            print "\t<td>";
            if ($col == 1 and $str == 1)
                print "<p><font color=\"$color_plus\">+</font>";
            elseif ($col == 1) 
                print "<p><font color=\"$color_line\">$str</font>";
            elseif ($str == 1)
                print "<p><font color=\"$color_line\">$col</font>";
            else
                print $col + $str;
            print "</td>\n";
        }
    }
    print "</table>";
?>

</body> </html>