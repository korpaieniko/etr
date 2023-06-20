<?php

include_once('fuggvenyek.php');

$torolthkn = $_POST["torolthkn"];
$torolthkk = $_POST["torolthkk"];

if ( isset($torolthkn) && isset($torolthkk) ) {
	
	$sikeres = hk_torlese($torolthkn, $torolthkk);
	
	if ( $sikeres ) {
		header('Location: felvette.php');
	} else {
		echo 'Hiba történt a törlés során';
	}
	
} else {
	echo 'Hiba történt a törlés során';
	
}

?>