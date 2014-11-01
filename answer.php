<?

	
	require_once('dbconnect.php');
	
	$tid = $_GET['tid'];
	$result = mysql_query("SELECT * FROM tests WHERE tid=$tid");
	$n = 0; $m = 0;
	while ($row = mysql_fetch_array($result)) {
		$n = $row['questions'];
		$m = $row['alternatives'];
	}
?>

<html>
	<head>
		<title>Answer sheet</title>
		<style>
			td {
				width: 30px;
				height: 50px;
				border: 10px;
				border-spacing: 30px;
				
			}
			table {
				border-spacing: 10px;
			}

			td.full {
				background-color: #000;
			}

			td.circle {
				border: 2px solid #000;
			}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<td class='blank'></td>
				<td class='blank'></td>
				<? 
					for ($i = 0; $i < $m; $i++) {
						echo "<td class='full'></td>";
					}
				?>
				<td class='blank'></td>
				<td class='blank'></td>
			</tr>			
			<tr>
				<? 
					for ($i = 0; $i < $m+4; $i++) {
						echo "<td class='blank'></td>";
					}
				?>
			</tr>
			<?
				for ($i = 0; $i < $n; $i++) { 
					print "<tr>";
					print "<td class='full'></td><td class='blank'></td>";

					for ($j = 0; $j < $m; $j++) {
						echo "<td class='circle'></td>";
					}
					echo "<td class='blank'></td><td class='full'></td>";
					echo "</tr>";
				}
			?>
			<tr>
				<? 
					for ($i = 0; $i < $m+4; $i++) {
						echo "<td class='blank'></td>";
					}
				?>
			</tr>
			<tr>
				<td class='blank'></td>
				<td class='blank'></td>
				<? 
					for ($i = 0; $i < $m; $i++) {
						echo "<td class='full'></td>";
					}
				?>
				<td class='blank'></td>
				<td class='blank'></td>
			</tr>

		</table>
	</body>
</html>
