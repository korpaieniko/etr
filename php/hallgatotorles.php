<?php

include_once('fuggvenyek.php');

$torolthallgato = $_POST["torolthallgato"];

if ( isset($torolthallgato) ) {
	
	$sikeres = hallgato_torlese($torolthallgato);
	
	if ( $sikeres ) {
		header('Location: hallgatok.php');
	} else {
		echo 'Hiba történt a hallgató törlése során';
	}
	
} else {
	echo 'Hiba történt a hallgató törlése során';
	
}

?>