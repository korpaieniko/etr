<?php

include_once("fuggvenyek.php");

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$teremnev =  $_POST['teremnev'];
$cim =  $_POST['cim'];
$epulet =  $_POST['epulet'];
$emelet =  $_POST['emelet'];
$ajto_szama =  $_POST['ajto_szama'];
$tipus =  $_POST['tipus'];
$ferohely =  $_POST['ferohely'];

if ( isset($teremnev) && isset($cim) && 
    isset($epulet) && isset($emelet) && isset($ajto_szama)
	&& isset($tipus) && isset($ferohely)) {

	// beszúrjuk az új rekordot az adatbázisba
	termet_beszur(
		$teremnev, $cim, $epulet, $emelet, 
		$ajto_szama, $tipus, $ferohely);
	
	// visszatérünk az index.php-re
	header("Location: termek.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>