<?php
	include("conn.php");


	$result = mysql_query("select * from user");

	echo "<table border = '1'>
	<tr>
	<th>username</th>
	<th>email</th>
	</tr>";

	while($row = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

?>
