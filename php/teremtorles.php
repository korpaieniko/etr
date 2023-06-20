<?php

include_once('fuggvenyek.php');

$toroltterem = $_POST["toroltterem"];

if ( isset($toroltterem) ) {
	
	$sikeres = terem_torlese($toroltterem);
	
	if ( $sikeres ) {
		header('Location: termek.php');
	} else {
		echo 'Hiba történt a terem törlése során';
	}
	
} else {
	echo 'Hiba történt a terem törlése során';
	
}

?>