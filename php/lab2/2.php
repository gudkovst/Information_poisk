<html> <head>
<title> Пусть переменная $lang может принимать значения "ru", "en", "fr" или "de". Используя операторы if-else-elseif обеспечьте вывод на экран полного названия языка (русский, английский, …) в зависимости от того, что задано в строке вызова скрипта </title> 
</head> <body>

<?php
    $lang = $_GET["lang"];

    if ($lang == "ru") print "Russian";
    elseif ($lang == "en") print "English";
    elseif ($lang == "fr") print "French";
    elseif ($lang == "de") print "Dutch";
    else print "ignota lingua (lat)";
?>

</body> </html>