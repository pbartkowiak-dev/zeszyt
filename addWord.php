<?php
header('Content-Type: application/json');

include_once("connect.php");

$esWord = str_replace('  ', ' ', trim( htmlentities($_GET['newWordEs'] ) ) );
$polWord = str_replace('  ', ' ', trim( htmlentities($_GET['newWordPol'] ) ) );

$query = 'INSERT INTO pol_es (es, pol) VALUES ("' .$esWord. '","'.$polWord. '")';


if ($connect->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $connect->error;
}