<?php

include_once("fuggvenyek.php");

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$neptun_kod =  $_POST['voktato'];
$kurzuskod =  $_POST['vkurzus'];


if ( isset($neptun_kod) && isset($kurzuskod) ) {

	// beszúrjuk az új rekordot az adatbázisba
	okt_beszur(
		$neptun_kod, $kurzuskod);
	
	// visszatérünk az index.php-re
	header("Location: tartja.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>