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
	<a href="kurzusok.php" > Kurzusok</a>
	<a href="termek.php" > Termek</a>
	<a href="hallgatok.php" id="aktualis"> Hallgatók</a>
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

<h2>Új hallgató adatainak felvitele az adatbázisba:</h2>
<form method="POST" action="hallgatofelvitel.php" accept-charset="utf-8">
	<label>Neptun kódja:</label>
	<input type="text" name="hneptun_kod"><br>
	<label>Neve:</label>
	<input type="text" name="hnev"><br>
	<label>Születési ideje:</label>
	<select name="szulev" />
	<?php
		for ($i=1900; $i<2022; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> év

	<select name="szulhonap" />
	<?php
		for ($i=1; $i<12; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> hónap

	<select name="szulnap" />
	<?php
		for ($i=1; $i<31; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>';
		}
	?>
	</select> nap <br>
	<label>Lakcíme:</label>
	<input type="text" name="lakcim"><br>
	<label>Szak: </label>
	<input type="text" name="szak"><br>
	<label>Felvétel éve:</label>
	<input type="text" name="felvetel_eve"><br>
	<input type="submit" name="hallgatohozzaad" value="Új hallgató felvétele">
</form>

<hr style="height:5px; border-width:0; color:#0076ab; background-color:#0076ab;">

<h2>Hallgatók:</h2>

<table border="1">
<tr>
<th>Neptun kód</th>
<th>Név</th>
<th>Születési idő</th>
<th>Lakcím</th>
<th>Szak</th>
<th>Felvétel éve</th>
</tr>

<?php

	$hallgatok = hallgatolistatLeker(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($hallgatok) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["neptun_kod"] .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["szuletesi_ido"] .'</td>';
		echo '<td>'. $egySor["lakcim"] .'</td>';
		echo '<td>'. $egySor["szak"] .'</td>';
		echo '<td>'. $egySor["felvetel_eve"] .'</td>';
		echo '<td><form method="POST" action="hallgatoszerkesztes.php">
				  <input type="hidden" name="mhallgato" value="'.$egySor["neptun_kod"].'" />
				  <input type="submit" value="módosítás" />
		          </form></td>';
		echo '<td><form method="POST" action="hallgatotorles.php">
				  <input type="hidden" name="torolthallgato" value="'.$egySor["neptun_kod"].'" />
				  <input type="submit" value="törlés" />
				  </form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($hallgatok); // töröljük a listát a memóriából

?>

</table>

	












</div>



</BODY>
</HTML>
