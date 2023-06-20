<?php

include_once('fuggvenyek.php');

$toroltkurzus = $_POST["toroltkurzus"];

if ( isset($toroltkurzus) ) {
	
	$sikeres = kurzus_torlese($toroltkurzus);
	
	if ( $sikeres ) {
		header('Location: kurzusok.php');
	} else {
		echo 'Hiba történt a kurzus törlése során';
	}
	
} else {
	echo 'Hiba történt a kurzus törlése során';
	
}

?>