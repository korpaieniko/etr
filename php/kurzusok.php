<?php
include_once('fuggvenyek.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html; charset=UTF8" >
	<style>
	.menu {
		height: 100%;
		width: 160px;
		position: fixed;
		z-index: 1;
		top: 0;
		left: 0;
		background-color: #111;
		overflow-x: hidden;
		padding-top: 20px;
	}
	.menu a {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 20px;
		color: white;
		display: block;
	}
	.menu a:hover {
		color: #0076ab;
	}
	.main {
		margin-left: 160px; 
		font-size: 16px;
		padding: 0px 10px;
	}
	#aktualis{
		text-decoration: underline;
	}
	label {
		margin: 5px;
		padding: 5px;
		text-align: left;
		display: inline-block;
		min-width: 120px;
	}

	input {
		margin: 5px;
		padding: 5px;
		text-align: left;
		display: inline-flex;
		vertical-align: bottom;
	}
	
	table {
		border-collapse: collapse;
		border: 2px solid;
	}
	th, td {
		padding: 5px;
		text-align: left;
		border: 1px solid;
	}
	
	</style>
	
</HEAD>
<BODY>

<div class="menu">
	<a href="index.php" > Főoldal</a>
	<a href="kurzusok.php" id="aktualis"> Kurzusok</a>
	<a href="termek.php"> Termek</a>
	<a href="hallgatok.php"> Hallgatók</a>
	<a href="oktatok.php"> Oktatók</a>
	<a href="felvette.php" > Felvette</a>
	<a href="tartja.php" > Tartja</a>
</div>

<div class="main">

<div style="display: inline-block;">
	<img src="logo.png" style="height: 100px;"/>
</div>
<div style="display: inline-block; vertical-align: top; font-size: 30px; 
			font-weight: bold; font-family: Monaco, monospace ">
	<p>ETR tanulmányi rendszer</p>
</div>
<hr style="height:5px; border-width:0; color:#0076ab; background-color:#0076ab;">

<!--Tartalom-->

<h2>Új kurzus adatainak felvitele az adatbázisba:</h2>
<form method="POST" action="kurzusfelvitel.php" accept-charset="utf-8">
	<label>Kurzus kódja:</label>
	<input type="text" name="kurzuskod"><br>
	<label>Kurzus neve:</label>
	<input type="text" name="kurzus_nev"><br>
	<label>Kurzus tipusa:</label>
	<input type="text" name="tipus"><br>
	<label>Aktuális létszám:</label>
	<input type="text" name="aktualis_letszam"><br>
	<label>Max létszám:</label>
	<input type="text" name="max_letszam"><br>
	<label>Kredit:</label>
	<input type="text" name="kredit"><br>
	<label>Kezdési időpont:</label>
	<input type="text" name="kezdesi_idopont"><br>
	<label>Időtartam (perc):</label>
	<input type="text" name="idotartam"><br>
	<label>Terem neve:</label>
	<input type="text" name="teremnev"><br>
	<input type="submit" name="kurzushozzaad" value="Új kurzus létrehozása">
</form>

<hr style="height:5px; border-width:0; color:#0076ab; background-color:#0076ab;">

<h2>Kurzusok:</h2>

<table border="1">
<tr>
<th>Kurzus kódja</th>
<th>Neve</th>
<th>Típusa</th>
<th>Aktuális létszám</th>
<th>Max létszám</th>
<th>Kredit</th>
<th>Kezdési időpont</th>
<th>Időtartam</th>
<th>Terem</th>
</tr>

<?php

	$kurzusok = kurzuslistatLeker(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($kurzusok) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["kurzuskod"] .'</td>';
		echo '<td>'. $egySor["kurzus_nev"] .'</td>';
		echo '<td>'. $egySor["tipus"] .'</td>';
		echo '<td>'. $egySor["aktualis_letszam"] .'</td>';
		echo '<td>'. $egySor["max_letszam"] .'</td>';
		echo '<td>'. $egySor["kredit"] .'</td>';
		echo '<td>'. $egySor["kezdesi_idopont"] .'</td>';
		echo '<td>'. $egySor["idotartam"] .'</td>';
		echo '<td>'. $egySor["teremnev"] .'</td>';
		echo '<td><form method="POST" action="kurzusszerkesztes.php">
				  <input type="hidden" name="mkurzus" value="'.$egySor["kurzuskod"].'" />
				  <input type="submit" value="módosítás" />
		          </form></td>';
		echo '<td><form method="POST" action="kurzustorles.php">
				  <input type="hidden" name="toroltkurzus" value="'.$egySor["kurzuskod"].'" />
				  <input type="submit" value="törlés" />
		          </form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($kurzusok); // töröljük a listát a memóriából

?>

</table>


</div>



</BODY>
</HTML>
