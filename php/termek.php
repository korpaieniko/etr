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
	<a href="termek.php" id="aktualis"> Termek</a>
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

<h2>Új terem adatainak felvitele az adatbázisba:</h2>
<form method="POST" action="teremfelvitel.php" accept-charset="utf-8">
	<label>Terem neve:</label>
	<input type="text" name="teremnev"><br>
	<label>Címe:</label>
	<input type="text" name="cim"><br>
	<label>Épület neve:</label>
	<input type="text" name="epulet"><br>
	<label>Emelet:</label>
	<input type="text" name="emelet"><br>
	<label>Ajtó száma:</label>
	<input type="text" name="ajto_szama"><br>
	<label>Típusa:</label>
	<input type="text" name="tipus"><br>
	<label>Férőhely:</label>
	<input type="text" name="ferohely"><br>
	<input type="submit" name="teremhozzaad" value="Új terem létrehozása">
</form>

<hr style="height:5px; border-width:0; color:#0076ab; background-color:#0076ab;">

<h2>Termek:</h2>

<table border="1">
<tr>
<th>Terem neve</th>
<th>Címe</th>
<th>Épület neve</th>
<th>Emelet</th>
<th>Ajtó száma</th>
<th>Típusa</th>
<th>Férőhely</th>
</tr>

<?php

	$termek = teremlistatLeker(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($termek) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["teremnev"] .'</td>';
		echo '<td>'. $egySor["cim"] .'</td>';
		echo '<td>'. $egySor["epulet"] .'</td>';
		echo '<td>'. $egySor["emelet"] .'</td>';
		echo '<td>'. $egySor["ajto_szama"] .'</td>';
		echo '<td>'. $egySor["tipus"] .'</td>';
		echo '<td>'. $egySor["ferohely"] .'</td>';
		echo '<td><form method="POST" action="teremszerkesztes.php">
				  <input type="hidden" name="mterem" value="'.$egySor["teremnev"].'" />
				  <input type="submit" value="módosítás" />
		          </form></td>';
		echo '<td><form method="POST" action="teremtorles.php">
				  <input type="hidden" name="toroltterem" value="'.$egySor["teremnev"].'" />
				  <input type="submit" value="törlés" />
		          </form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($termek); // töröljük a listát a memóriából

?>

</table>

	












</div>



</BODY>
</HTML>
