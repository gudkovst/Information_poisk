<html> <head>
<title> Используя переменные $color и $size сформировать php-скрипт, который выводит на экран строку текста заданным цветом и размером. </title> 
</head> <body>

<?php
    $color = $_GET["color"];
    $size = $_GET["size"];
    $text = $_GET["text"];
    if (!$text) $text = "some text";

    print "<p><font color=\"$color\" size=\"$size\">$text</font>";
?>

</body> </html>