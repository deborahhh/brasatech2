<? 
	
	require_once('dbconnect.php');
	// $action = $_GET['action'];
	// $return = [];

	// if ($action == 'tests') {
		$return = [];
		$result = mysql_query("SELECT * FROM tests");
		while ($row = mysql_fetch_array($result)) {
			$tid = $row['tid'];
			$result2 = mysql_query("SELECT * FROM questions WHERE tid=$tid ORDER BY idx");
			$ans = [];
			while ($row2 = mysql_fetch_array($result2)) {
				$ans[] = $row2['correct'];			
			}
			$row['answers'] = $ans;
  			$return[] = $row;

		}

	// }
	// else if ($action == 'single') {
	// 	$tid = $_GET['tid'];
	// 	$result = mysql_query("SELECT * FROM tests WHERE tid=$tid");
	// 	$row = mysql_fetch_array($result);
	// }


	echo json_encode($return);
?>
