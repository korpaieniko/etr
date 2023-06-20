<?php

include_once("fuggvenyek.php");

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$kurzuskod =  $_POST['kurzuskod'];
$kurzus_nev =  $_POST['kurzus_nev'];
$tipus =  $_POST['tipus'];
$aktualis_letszam =  $_POST['aktualis_letszam'];
$max_letszam =  $_POST['max_letszam'];
$kredit =  $_POST['kredit'];
$kezdesi_idopont =  $_POST['kezdesi_idopont'];
$idotartam =  $_POST['idotartam'];
$teremnev =  $_POST['teremnev'];

if ( isset($kurzuskod) && isset($kurzus_nev) && 
    isset($tipus) && isset($aktualis_letszam) && isset($max_letszam)
	&& isset($kredit) && isset($kezdesi_idopont) && isset($idotartam)
	&& isset($teremnev) ) {

	// beszúrjuk az új rekordot az adatbázisba
	kurzust_beszur(
		$kurzuskod, $kurzus_nev, $tipus, $aktualis_letszam, 
		$max_letszam, $kredit, $kezdesi_idopont, $idotartam, $teremnev);
	
	// visszatérünk az index.php-re
	header("Location: kurzusok.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}

?>