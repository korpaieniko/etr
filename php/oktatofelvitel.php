<?php

include_once("fuggvenyek.php");

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$oneptun_kod =  $_POST['oneptun_kod'];
$onev =  $_POST['onev'];
$szulev = $_POST['szulev'];
$szulhonap = $_POST['szulhonap'];
$szulnap = $_POST['szulnap'];
$oszuletesi_ido =  date('Y-m-d', mktime(0,0,0, $szulhonap, $szulnap, $szulev));
$intezet_neve =  $_POST['intezet_neve'];
$iroda_cime =  $_POST['iroda_cime'];

if ( isset($oneptun_kod) && isset($onev) && 
    isset($oszuletesi_ido) && isset($intezet_neve) && isset($iroda_cime)) {

	// beszúrjuk az új rekordot az adatbázisba
	oktatot_beszur(
		$oneptun_kod, $onev, $oszuletesi_ido, $intezet_neve, 
		$iroda_cime);
	
	// visszatérünk az index.php-re
	header("Location: oktatok.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>