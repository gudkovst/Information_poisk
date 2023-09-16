<html> <head>
<title> Создайте 4 функции с именами Ru(), En(), Fr(), De(). Каждая функция выводит на экран приветствие на соответствующем языке. Эти функции имеют аргумент $color, который определяет цвет выводимого текста. Используя функцию-переменную $lang(), отобразить на экране одно из приветствий, причем какое приветствие будет выведено и каким цветом - задать как параметры в строке вызова скрипта. </title> 
</head> <body>

<?php
    function Ru($color) { print "<p><font color=\"$color\">Здравствуйте!</font>"; }
    function En($color) { print "<p><font color=\"$color\">Hello!</font>"; }
    function Fr($color) { print "<p><font color=\"$color\">Bonjour!</font>"; }
    function De($color) { print "<p><font color=\"$color\">Guten Tag!</font>"; }

    $lang = $_GET["lang"];
    $color = $_GET["color"];

    if (!$lang) print "<p><font color=\"$color\">Change lang</font>";
    else $lang($color);
?>

</body> </html>