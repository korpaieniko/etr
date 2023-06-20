<?php

include_once('fuggvenyek.php');

$neptun_kod = $_POST["toroltokn"];
$kurzuskod = $_POST["toroltokk"];

if ( isset($neptun_kod) && isset($kurzuskod) ) {
	
	$sikeres = ok_torlese($neptun_kod, $kurzuskod);
	
	if ( $sikeres ) {
		header('Location: tartja.php');
	} else {
		echo 'Hiba történt a törlés során';
	}
	
} else {
	echo 'Hiba történt a törlés során';
	
}

?>