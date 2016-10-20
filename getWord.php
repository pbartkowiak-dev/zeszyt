<?php
header('Content-Type: application/json');

$db_host = 'localhost';
$db_name = 'zeszyt';
$db_pass = '';
$db_user = 'root';

$query_es = "SELECT * WHERE id = FROM pol_es";

// connect to the database
$connect = new mysqli($db_host, $db_user, $db_pass, $db_name);
$connect->set_charset("utf8");

if (!$connect){
	die('Server error, try again later');
} else {
	
	// get number of rows
	if ($rows = $connect -> query("SELECT COUNT(*) FROM pol_es")){
		$rows_num = $rows -> fetch_object() -> {'COUNT(*)'} ;
		
		// generate random number between 1 and the total number of rows in table
		$random_number = rand(1, $rows_num);
		
		// get random word from the table
		if($result = $connect -> query( "SELECT * FROM pol_es WHERE id = " . $random_number )){
		
			$row = $result -> fetch_object();
			$pol = $row -> pol;
			$es = $row -> es;
			$id = $row -> id;
			
			$json = array(
				'pol' => $pol,
				'es' => $es,
				'id' => $id
			);
		
			echo json_encode($json);
			
		} else {
			die("error");
		}
		
	} else {
		echo "error";
	}
	
	
}

