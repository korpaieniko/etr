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
$teremnev_eredeti = $_POST["mterem"];

if ( isset($teremnev) && isset($cim) && 
    isset($epulet) && isset($emelet) && isset($ajto_szama)
	&& isset($tipus) && isset($ferohely)) {

	$sikeres = termet_modosit(
		$teremnev, $cim, $epulet, $emelet, 
		$ajto_szama, $tipus, $ferohely, $teremnev_eredeti);
	
	if ($sikeres == false) {
		die("Nem sikerült módosítani");
	} else {
		header("Location: termek.php");
	}

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>