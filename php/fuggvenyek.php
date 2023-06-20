<?php

function etr_csatlakozas() {
	
	$conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "etr" )  ) {
		
		return null;
	}
	
	// a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást!
	mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf8');
	
	return $conn;
	
}


////////////////////////////////
///////////KURZUSOK/////////////
////////////////////////////////


function kurzust_beszur($kurzuskod, $kurzus_nev, $tipus, $aktualis_letszam,
		$max_letszam, $kredit, $kezdesi_idopont, $idotartam, $teremnev) {
	
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO kurzus VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sssssssss",
		$kurzuskod, $kurzus_nev, $tipus, $aktualis_letszam,
		$max_letszam, $kredit, $kezdesi_idopont, $idotartam, $teremnev);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function kurzuslistatLeker() {
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}


	$result = mysqli_query( $conn,"SELECT * FROM kurzus");
	
	mysqli_close($conn);
	return $result;
	
}

function kurzus_torlese($kurzuskod) {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM kurzus WHERE kurzuskod = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $kurzuskod);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function kurzusadatot_leker($kurzuskod){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,
		"SELECT kurzuskod, kurzus_nev, tipus, aktualis_letszam, max_letszam, 
		kredit, kezdesi_idopont, idotartam, teremnev
		FROM kurzus WHERE kurzuskod = ?");
	
	mysqli_stmt_bind_param($stmt, "s", $kurzuskod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	mysqli_stmt_bind_result($stmt, $kurzuskod, $kurzus_nev, $tipus, 
				$aktualis_letszam, $max_letszam, $kredit, $kezdesi_idopont,
				$idotartam, $teremnev);
	
	$reader = array();
	mysqli_stmt_fetch($stmt);
	$reader["kurzuskod"] = $kurzuskod;
	$reader["kurzus_nev"] = $kurzus_nev;
	$reader["tipus"] = $tipus;
	$reader["aktualis_letszam"] = $aktualis_letszam;
	$reader["max_letszam"] = $max_letszam;
	$reader["kredit"] = $kredit;
	$reader["kezdesi_idopont"] = $kezdesi_idopont;
	$reader["idotartam"] = $idotartam;
	$reader["teremnev"] = $teremnev;
	
	mysqli_close($conn);
	return $reader;
	
}

function kurzust_modosit(
		$kurzuskod, $kurzus_nev, $tipus, $aktualis_letszam, 
		$max_letszam, $kredit, $kezdesi_idopont, $idotartam, $teremnev){

	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"UPDATE kurzus SET kurzus_nev = ?, tipus = ?,
		aktualis_letszam = ?, max_letszam = ?, kredit = ?, 
		kezdesi_idopont = ?, idotartam = ?, teremnev = ? WHERE kurzuskod = ?");
	
	mysqli_stmt_bind_param($stmt, "sssssssss",
		$kurzus_nev, $tipus, $aktualis_letszam, $max_letszam, $kredit, 
		$kezdesi_idopont, $idotartam, $teremnev, $kurzuskod);
		
	$sikeres = mysqli_stmt_execute($stmt);
	
	if($sikeres == false) {
		die(mysqli_error($conn));
	}
	mysqli_close($conn);
	return $sikeres;
	
}

///////////////////////////////
///////////TERMEK//////////////
///////////////////////////////


function termet_beszur($teremnev, $cim, $epulet, $emelet, 
		$ajto_szama, $tipus, $ferohely) {
	
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO terem VALUES (?, ?, ?, ?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sssssss",
		$teremnev, $cim, $epulet, $emelet, 
		$ajto_szama, $tipus, $ferohely);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function teremlistatLeker() {
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query( $conn,"SELECT * FROM terem");
	
	mysqli_close($conn);
	return $result;
}

function terem_torlese($teremnev) {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM terem WHERE teremnev = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $teremnev);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function teremadatot_leker($teremnev){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,
		"SELECT teremnev, cim, epulet, emelet, ajto_szama, tipus, ferohely
		FROM terem WHERE teremnev = ?");
	
	mysqli_stmt_bind_param($stmt, "s", $teremnev);
	
	$result = mysqli_stmt_execute($stmt);
	
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	mysqli_stmt_bind_result($stmt, $teremnev, $cim, $epulet, $emelet, 
		$ajto_szama, $tipus, $ferohely);
	
	$reader = array();
	mysqli_stmt_fetch($stmt);
	$reader["teremnev"] = $teremnev;
	$reader["cim"] = $cim;
	$reader["epulet"] = $epulet;
	$reader["emelet"] = $emelet;
	$reader["ajto_szama"] = $ajto_szama;
	$reader["tipus"] = $tipus;
	$reader["ferohely"] = $ferohely;
	
	mysqli_close($conn);
	return $reader;
	
}

function termet_modosit($teremnev, $cim, $epulet, $emelet, 
		$ajto_szama, $tipus, $ferohely, $mterem){

	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"UPDATE terem SET teremnev =?, cim = ?, epulet = ?,
		emelet = ?, ajto_szama = ?, tipus = ?, ferohely = ? WHERE teremnev = ?");
	
	mysqli_stmt_bind_param($stmt, "ssssssss",
		$teremnev, $cim, $epulet, $emelet, $ajto_szama, $tipus, $ferohely, $mterem );
		
	$sikeres = mysqli_stmt_execute($stmt);
	
	if($sikeres == false) {
		die(mysqli_error($conn));
	}
	mysqli_close($conn);
	return $sikeres;
	
}



///////////////////////////////
///////////HALLGATÓK///////////
///////////////////////////////


function hallgatot_beszur($hneptun_kod, $hnev, $szuletesi_ido, $lakcim, 
		$szak, $felvetel_eve) {
	
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO hallgato VALUES (?, ?, ?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ssssss",
		$hneptun_kod, $hnev, $szuletesi_ido, $lakcim, 
		$szak, $felvetel_eve);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function hallgatolistatLeker() {
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	

	$result = mysqli_query( $conn,"SELECT * FROM hallgato");
	
	mysqli_close($conn);
	return $result;
	
}

function hallgato_torlese($hneptun_kod) {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM hallgato WHERE neptun_kod = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $hneptun_kod);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt);
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function hallgatoadatot_leker($hneptun_kod){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"SELECT neptun_kod, nev, 
		YEAR(szuletesi_ido) AS ev, MONTH(szuletesi_ido) AS honap, 
		DAY(szuletesi_ido) AS nap, lakcim, szak, felvetel_eve
		FROM hallgato WHERE neptun_kod = ?");
	
	mysqli_stmt_bind_param($stmt, "s", $hneptun_kod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	mysqli_stmt_bind_result($stmt, $hneptun_kod, $hnev, 
		$ev, $honap, $nap, $lakcim, $szak, $felvetel_eve);
	
	$reader = array();
	mysqli_stmt_fetch($stmt);
	$reader["hneptun_kod"] = $hneptun_kod;
	$reader["hnev"] = $hnev;
	$reader["ev"] = $ev;
	$reader["honap"] = $honap;
	$reader["nap"] = $nap;
	$reader["lakcim"] = $lakcim;
	$reader["szak"] = $szak;
	$reader["felvetel_eve"] = $felvetel_eve;
	
	mysqli_close($conn);
	return $reader;
	
}

function hallgatot_modosit($hneptun_kod, $hnev, $hszuletesi_ido,
						$lakcim, $szak, $felvetel_eve){

	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"UPDATE hallgato SET nev = ?, szuletesi_ido = ?,
		lakcim = ?, szak = ?, felvetel_eve = ? WHERE neptun_kod = ?");
	
	mysqli_stmt_bind_param($stmt, "ssssss",
		$hnev, $hszuletesi_ido, $lakcim, 
		$szak, $felvetel_eve, $hneptun_kod);
		
	$sikeres = mysqli_stmt_execute($stmt);
	
	if($sikeres == false) {
		die(mysqli_error($conn));
	}
	mysqli_close($conn);
	return $sikeres;
	
}

///////////////////////////////
///////////OKTATÓK/////////////
///////////////////////////////

function oktatot_beszur($oneptun_kod, $onev, $oszuletesi_ido, $intezet_neve, 
		$iroda_cime) {
	
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO oktato VALUES (?, ?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "sssss",
		$oneptun_kod, $onev, $oszuletesi_ido, $intezet_neve, 
		$iroda_cime);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function oktatolistatLeker() {
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query( $conn,"SELECT * FROM oktato");
	
	mysqli_close($conn);
	return $result;
	
}

function oktato_torlese($oneptun_kod) {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM oktato WHERE neptun_kod = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "s", $oneptun_kod);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function oktatoadatot_leker($oneptun_kod){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"SELECT neptun_kod, nev, 
		YEAR(szuletesi_ido) AS ev, MONTH(szuletesi_ido) AS honap, 
		DAY(szuletesi_ido) AS nap, intezet_neve, iroda_cime
		FROM oktato WHERE neptun_kod = ?");
	
	mysqli_stmt_bind_param($stmt, "s", $oneptun_kod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	mysqli_stmt_bind_result($stmt, $oneptun_kod, $onev, 
		$ev, $honap, $nap, $intezet_neve, $iroda_cime);
	
	$reader = array();
	mysqli_stmt_fetch($stmt);
	$reader["oneptun_kod"] = $oneptun_kod;
	$reader["onev"] = $onev;
	$reader["ev"] = $ev;
	$reader["honap"] = $honap;
	$reader["nap"] = $nap;
	$reader["intezet_neve"] = $intezet_neve;
	$reader["iroda_cime"] = $iroda_cime;
	
	mysqli_close($conn);
	return $reader;
	
}

function oktatot_modosit($oneptun_kod, $onev, $oszuletesi_ido,
						$intezet_neve, $iroda_cime){

	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"UPDATE oktato SET nev = ?, szuletesi_ido = ?,
		intezet_neve = ?, iroda_cime = ? WHERE neptun_kod = ?");
	
	mysqli_stmt_bind_param($stmt, "sssss",
		$onev, $oszuletesi_ido, $intezet_neve, 
		$iroda_cime, $oneptun_kod);
		
	$sikeres = mysqli_stmt_execute($stmt);
	
	if($sikeres == false) {
		die(mysqli_error($conn));
	}
	mysqli_close($conn);
	return $sikeres;
	
}

////////////////////////////////////
/////////////FELVETTE///////////////
////////////////////////////////////

function nemfelvettkurzusok($neptun_kod) {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$stmt = mysqli_prepare( $conn,"
				SELECT kurzuskod, kurzus_nev
				FROM kurzus 
				WHERE kurzuskod 
				NOT IN (SELECT kurzuskod FROM felvette WHERE neptun_kod = ?)");
	
	mysqli_stmt_bind_param($stmt, "s", $neptun_kod);
		
	$sikeres = mysqli_stmt_execute($stmt);
	
	if($sikeres == false) {
		die(mysqli_error($conn));
	}
	mysqli_close($conn);
	return $sikeres;
	
	
	/*$stmt = mysqli_prepare( $conn,"
				SELECT kurzuskod, kurzus_nev
				FROM kurzus 
				WHERE kurzuskod 
				NOT IN (SELECT kurzuskod FROM felvette WHERE neptun_kod = ?)");
	
	mysqli_stmt_bind_param($stmt, "s", $neptun_kod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	mysqli_close($conn);
	return $result;
	*/
	/*
	$lista = array();
	
	while($sor = mysqli_fetch_assoc($result)){
		array_push($lista, $sor);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	return $lista;
	*/
}
	
	
	

function hallgatokurzuslistatLeker(){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query( $conn,"
			SELECT hallgato.neptun_kod, hallgato.nev, kurzus.kurzuskod, kurzus.kurzus_nev  
			FROM hallgato, kurzus, felvette
			WHERE hallgato.neptun_kod = felvette.neptun_kod AND kurzus.kurzuskod = felvette.kurzuskod
			GROUP BY neptun_kod, kurzuskod");
	
	mysqli_close($conn);
	return $result;
	
}

function hkt_beszur($neptun_kod, $kurzuskod) {
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO felvette VALUES (?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss",
		$neptun_kod, $kurzuskod);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function hk_torlese($neptun_kod, $kurzuskod) {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM felvette WHERE neptun_kod = ? AND kurzuskod = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $neptun_kod, $kurzuskod);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

////////////////////////////////////
/////////////TARTJA///////////////
////////////////////////////////////

function nemtartottkurzusok() {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query( $conn,"
				SELECT kurzuskod, kurzus_nev
				FROM kurzus 
				WHERE kurzuskod 
				NOT IN (SELECT kurzuskod FROM tartja GROUP BY kurzuskod)
                GROUP BY kurzuskod");
	
	if(result == false){
		die(mysqli_error($conn));
	}
	
	mysqli_close($conn);
	return $result;

/*	
	$stmt = mysqli_prepare( $conn,"
				SELECT kurzuskod 
				FROM kurzus 
				WHERE kurzuskod 
				NOT IN (SELECT kurzuskod FROM tartja WHERE neptun_kod = ?)");
	
	mysqli_stmt_bind_param($stmt, "s", $neptun_kod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	$lista = array();
	
	while($sor = mysqli_fetch_assoc($result)){
		array_push($lista, $sor);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	return $lista;
*/
	
}

function oktatokurzuslistatLeker(){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query( $conn,"
			SELECT oktato.neptun_kod, oktato.nev, kurzus.kurzuskod, kurzus.kurzus_nev  
			FROM oktato, kurzus, tartja
			WHERE oktato.neptun_kod = tartja.neptun_kod AND kurzus.kurzuskod = tartja.kurzuskod
			GROUP BY neptun_kod, kurzuskod");
	
	mysqli_close($conn);
	return $result;
	
}

function okt_beszur($neptun_kod, $kurzuskod) {
	
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO tartja VALUES (?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss",
		$neptun_kod, $kurzuskod);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function ok_torlese($neptun_kod, $kurzuskod) {
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"DELETE FROM tartja WHERE neptun_kod = ? AND kurzuskod = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ss", $neptun_kod, $kurzuskod);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}



////////////////////////////////////
///////////LEKÉRDEZÉSEK/////////////
////////////////////////////////////

function oktatok_orai(){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query($conn, 
			"SELECT oktato.neptun_kod, oktato.nev, COUNT(kurzuskod) AS db 
			FROM oktato 
			LEFT JOIN tartja ON oktato.neptun_kod = tartja.neptun_kod 
			GROUP BY neptun_kod
			ORDER BY oktato.nev" );
			
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	$lista = array();
	while($sor = mysqli_fetch_assoc($result)){
		array_push($lista, $sor);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	return $lista;

}

function hallgatok_orai(){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query($conn, 
			"SELECT hallgato.neptun_kod, nev, COUNT(kurzuskod) AS db 
			FROM hallgato 
			LEFT JOIN felvette ON hallgato.neptun_kod = felvette.neptun_kod 
			GROUP BY neptun_kod
			ORDER BY hallgato.nev" );
			
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	$lista = array();
	while($sor = mysqli_fetch_assoc($result)){
		array_push($lista, $sor);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	return $lista;

}

function oktatok_fo(){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query($conn, 
			"SELECT oktato.neptun_kod, oktato.nev, COUNT(felvette.kurzuskod) AS fo
			FROM oktato
			LEFT JOIN tartja ON oktato.neptun_kod = tartja.neptun_kod 
			LEFT JOIN felvette ON tartja.kurzuskod = felvette.kurzuskod
			GROUP BY oktato.nev
			ORDER BY fo DESC" );
			
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	$lista = array();
	while($sor = mysqli_fetch_assoc($result)){
		array_push($lista, $sor);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	return $lista;

}

function oktatok_nulla(){
	if ( !($conn = etr_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	$result = mysqli_query($conn, 
			"SELECT oktato.neptun_kod, oktato.nev, tartja.kurzuskod, kurzus_nev
			FROM oktato, tartja, kurzus
            WHERE oktato.neptun_kod = tartja.neptun_kod
            AND kurzus.kurzuskod = tartja.kurzuskod
			AND tartja.kurzuskod NOT IN (SELECT kurzuskod FROM felvette GROUP BY kurzuskod)" );
			
	if($result == false) {
		die(mysqli_error($conn));
	}
	
	$lista = array();
	while($sor = mysqli_fetch_assoc($result)){
		array_push($lista, $sor);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	return $lista;

}