
<?php

	function vid_structure($conn, $table){
		print "<h4>Structure of table $table";
		$result = mysqli_query($conn, "DESCRIBE $table");
		$num_rows = mysqli_num_rows($result);
		$num_fields = mysqli_num_fields($result);
		print "<p><table style='border: 1px'>\n";
		print "<tr>\n";
		for ($x = 0; $x < $num_fields; $x++) {
		    $name = mysqli_fetch_field_direct($result, $x)->name;
		    print "\t<th>$name</th>\n";
		}
		print "</tr>\n";
		while ($a_row = mysqli_fetch_row($result)) {
		    print "<tr>\n";
		    foreach ($a_row as $field)
		        print "\t<td>$field</td>\n";
		    print "</tr>\n";
		}
		print "</table>\n";
	}

	function vid_content($conn, $table){
		$rus_name = array('cnum' => 'Номер покупателя', 'cname' => 'Имя покупателя', 'city' => 'Город', 'rating' => 'Оценка', 'snum' => 'Номер продавца',
						  'snum' => 'Номер продавца', 'sname' => 'Имя продавца', 'city' => 'Город', 'comm' => 'Комиссия',
						  'onum' => 'Номер заказа', 'amt' => 'Стоимость', 'odate' => 'Дата', 'cnum' => 'Number customer', 'snum' => 'Номер продавца');
		print "<h4>Content of table $table";
		$result = mysqli_query($conn, "SELECT * FROM $table");
		$num_rows = mysqli_num_rows($result);
		$num_fields = mysqli_num_fields($result);
		print "<p><table style='border: 10'>\n";
		print "<tr>\n";
		for ($x = 0; $x < $num_fields; $x++) {
		    $name = mysqli_fetch_field_direct($result, $x)->name;
		    print "\t<th>$rus_name[$name]<br>$name</br></th>\n";
		}
		print "</tr>\n";
		while ($a_row = mysqli_fetch_row($result)){
		    print "<tr>\n";
		    foreach ($a_row as $field)
		        print "\t<td>$field</td>\n";
		    print "</tr>\n";
		}
		print "</table>\n";
	}

	foreach ($structure as $table)
		vid_structure($conn, $table);
	foreach ($content as $table)
		vid_content($conn, $table);

	print "<p>";
	print "<a href=\"1.html\"> return to select tables</a>";
?>