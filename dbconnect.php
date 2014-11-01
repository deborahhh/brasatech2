<? 	

	define('DB_HOST', 'localhost'); 
	define('DB_NAME', 'deborahh_brasatech'); 
	define('DB_USER','deborahh_btech'); 
        define('DB_PASSWORD','brasatech00'); 

	// define('DB_HOST', 'localhost'); 
	// define('DB_NAME', 'testr'); 
	// define('DB_USER','root'); 
	// define('DB_PASSWORD','root'); 

	$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

?>
