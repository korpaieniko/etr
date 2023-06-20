<?php

include_once("fuggvenyek.php");

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$hneptun_kod =  $_POST['hneptun_kod'];
$hnev =  $_POST['hnev'];
$szulev = $_POST['szulev'];
$szulhonap = $_POST['szulhonap'];
$szulnap = $_POST['szulnap'];
$szuletesi_ido =  date('Y-m-d', mktime(0,0,0, $szulhonap, $szulnap, $szulev));
$lakcim =  $_POST['lakcim'];
$szak =  $_POST['szak'];
$felvetel_eve =  $_POST['felvetel_eve'];

if ( isset($hneptun_kod) && isset($hnev) && 
    isset($szuletesi_ido) && isset($lakcim)
	&& isset($szak) && isset($felvetel_eve)) {

	// beszúrjuk az új rekordot az adatbázisba
	hallgatot_beszur(
		$hneptun_kod, $hnev, $szuletesi_ido, $lakcim,
		$szak, $felvetel_eve);
	
	// visszatérünk az index.php-re
	header("Location: hallgatok.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>