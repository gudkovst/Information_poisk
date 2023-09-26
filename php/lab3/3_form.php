<html> <head>
<title> Game: "Cities and monuments" </title> 
</head> <body>

    <?php
        $list = "<select name=\"otv[]\" size=1>
                    <option value=\"\">located in the city
                    <option value=\"1\">St. Petersburg
                    <option value=\"2\">Moscow
                    <option value=\"3\">Jerusalem
                    <option value=\"4\">Milan
                    <option value=\"5\">Paris
                    <option value=\"6\">Madrid
                    <option value=\"7\">London
                    <option value=\"8\">New York
                    <option value=\"9\">Berlin
                </select>";

        $cities = array("Prado Museum", "Reichstag", "La Scala Opera House", "Bronze Horseman", "Wailing Wall", "Tretyakov Gallery", "Arc de Triomphe", "Statue of Liberty", "Tower");
    ?>
    <form action="3.php" method="POST">
        <p><b>Cities and monuments</b></p>
        <p>Enter your name</p>
        <input type="text" name="user">
        <p>Determine in which city the monument is located</p>
        
        <?php
            foreach ($cities as $city) 
                 print "<p>".$city."    ".$list."</p>\n";
        ?>

        <input type="submit" value="Check">
    </form>
    <form action="3_form.php"><input type="submit" value="Clean"></form>

</body> </html>