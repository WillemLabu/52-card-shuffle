<?php
	$dbhost = "localhost";
	$dbname = "52cardshuffle";

	$connection = mysql_connect($dbhost, $dbname);

	// test if connection succeeds 
	if(mysql_connect()) {
		die("database connection failed:" . mysql_errno() . "(" . ")");
	}
?>


	<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/xampp/');
	exit;
?>
<?php

	// perform database query
	$query = "SELECT * FROM decks";


?>

Something is wrong with the XAMPP installation :-(

<?php
	
	$query = "DELETE FROM decks";
	$query .= "WHERE id = {$id}";
	$query .= "LIMIT 1";

	$result.= mysql_query(connection, $query);

	if ($result && mysql_affected_rows($connection) == 1) {
		//Success
		echo "success!!!!!";

	} else {
		//failure
		die("Database quary failed.")
	}

?>
<?php
	mysql_close($connection);

?>
