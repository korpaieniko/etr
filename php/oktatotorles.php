<?php

include_once('fuggvenyek.php');

$toroltoktato = $_POST["toroltoktato"];

if ( isset($toroltoktato) ) {
	
	$sikeres = oktato_torlese($toroltoktato);
	
	if ( $sikeres ) {
		header('Location: oktatok.php');
	} else {
		echo 'Hiba történt az oktató törlése során';
	}
	
} else {
	echo 'Hiba történt az oktató törlése során';
	
}

?>