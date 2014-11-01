<?
// var_dump($_GET);
	
	 require_once('dbconnect.php');
	
	$tid = $_GET['tid'];
	// $result = mysql_query("SELECT * FROM tests WHERE tid=$tid");
	// $n = 0; $m = 0;
	// $row = mysql_fetch_array($result);
	// $n = $row['questions'];
	// $m = $row['alternatives'];
	
?>

<html>
	<head>
		<title>Print test</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

	</head>
	<body style="padding: 30px;">
		<table>
			<tr>
				<td>Student Name:</td><td></td>
			<tr>
		</table><br><br>

				<?
				// var_dump($tid) ;/*
					$result = mysql_query("SELECT * FROM questions WHERE tid=$tid ORDER BY idx");
					while ($row = mysql_fetch_array($result)) {
						echo "<label>Question ".$row['idx']."</label><br>";
						echo "<span>".$row['enun']."</span></br>";
						echo "<ul>";
						$qid = $row['qid'];
						$result2 = mysql_query("SELECT * FROM alternatives WHERE qid=$qid ORDER BY idx");
						while($row2 = mysql_fetch_array($result2)) {
							echo "<li>".$row2['txt']."</li>";
						}
						echo "</ul></br></br>";
					}
				?>


	</body>
</html>
