<?


	require_once('dbconnect.php');
	
	if ($_POST['title']) {
		$title = $_POST['title'];
		$n = $_POST['nquestions'];
		$m = $_POST['nalternatives'];

		$query = "INSERT INTO tests (title,questions,alternatives) VALUES ('$title','$n','$m')"; 
		$data = mysql_query($query) or die(mysql_error()); 
		
		$tid = mysql_insert_id();


		for ($i = 0; $i < $n; $i++) {
			$enun = $_POST['q'.$i];
			$correct = $_POST['acorrectq'.$i];

			$query = "INSERT INTO questions (tid,idx,correct,enun) VALUES ('$tid','$i','$correct','$enun')"; 
			$data = mysql_query($query) or die(mysql_error()); 
			$qid = mysql_insert_id();

			for ($j = 0; $j < $m; $j++) {
				$alternative = $_POST['a'.$j.'q'.$i];
				$query = "INSERT INTO alternatives (qid,txt,idx) VALUES ('$qid','$alternative','$j')"; 
				$data = mysql_query($query) or die(mysql_error()); 
			}
		}
	}





?>

<html>
	<head>
		<title>testr</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="index.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			$('#add_test').hide();
		</script>
	</head>
	<body>
		<div id="header"></div>
		<div id="content">	
			<div id="your_tests">
				<table style="border-spacing: 10px; border-collapse: separate">
					<? 
						$result = mysql_query("SELECT * FROM tests");
						while ($row = mysql_fetch_array($result)) {
							echo "<tr><td>".$row['title']."</td>";
							echo "<td><a href='test.php?tid=".$row['tid']."'>Print test</a></td>";
							echo "<td><a href='answer.php?tid=".$row['tid']."'>Print answer sheet</a></td></tr>";
						}
					?>
				</table>


			</div>
			<div id="add_test">
				<form action="index.php" method="post">
					<fieldset>
						<legend>Add new test</legend>
						<label>Test title</label>
						<input name="title" type="text" placeholder="Eg.: Mathematics Grade 11"></input><br>
						<label># of alternatives</label>
						<input id="nalternatives" name="nalternatives" type="text" placeholder="Eg.: 5"></input><br>
						<label># of questions</label>
						<input id="nquestions" name="nquestions" type="text" placeholder="Eg.: 10"></input><br>
						<button id="add_questions" class="btn" type="button">Add questions</button>
						<div id="questions_container">
							<div id="questions">
							</div><br>
							<button id="submit" class="btn" type="submit">Submit</button>
						</div>
					</fieldset>	
				</form>
			</div>
			<script>
				$('#add_questions').click(function () {
					var m = $("#nalternatives").val();
					var n = $("#nquestions").val();
					html = '';
					for (var i = 0; i < n; i++) {
						html += '<br><br><legend>Question '+(i+1)+'</legend>';
						html += '<input name=\'q'+i+'\' type=\'text\' style=\'width: 400px\'></input>';
						html += '<table style=\'border-spacing: 10px, border-collapse: separate\'><tr><td style=\'text-align: center\'>Correct</td><td style=\'text-align: center\'>Alternative</td></tr>';
						for (var j = 0; j < m; j++) {
							var checked = (j == 0) ? " checked=\'checked\'" : "";
							html += '<tr><td><input type=\'radio\' name=\'acorrectq'+i+'\''+checked+' value=\''+j+'\'/></td><td><input type=\'text\' name=\'a'+j+'q'+i+'\'/></td></tr>';
						}
						html += '</table>';
					}
					$('#questions').html(html);
				});

				$('#submit').click(function() {
					$('#add_test').hide();
				})
			</script>
		</div>
		<div id="footer"></div>
	</body>
</html>
