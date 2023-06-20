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
	<a href="hallgatok.php" > Hallgatók</a>
	<a href="oktatok.php" > Oktatók</a>
	<a href="felvette.php" id="aktualis"> Felvette</a>
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

<h2>Kurzus felvétele:</h2>

<form method="POST" action="hallgatokurzusfelvitel.php" accept-charset="utf-8">
	<label>Hallgató:</label>
	<select name="vhallgato">
	<?php
		$neptun_kod =  $_POST['vhallgato'];
		echo '<option value="'.$neptun_kod.'">'.$neptun_kod.'</option>';
	?>
	</select>
	<br>
	<label>Kurzus:</label>
	<select name="vkurzus">
	
	<?php
		//$neptun_kod =  $_POST['vhallgato'];
		$nemfelvettkurzusok = nemfelvettkurzusok($neptun_kod);
		if(mysqli_num_rows($nemfelvettkurzusok) > 0){
			while( $sor = mysqli_fetch_assoc($nemfelvettkurzusok)){
				echo '<option value="'.$sor["kurzuskod"].'">'.$sor["kurzuskod"].' - '.$sor["kurzus_nev"].'</option>';
			}
		} else {
			echo '<option value="nincskurzus"> NINCS NEM FELVETT KURZUS </option>';
		}
		mysqli_free_result($nemfelvettkurzusok);
	?>
	</select>
	<br>
	
	<input type="submit" name="hallgatokurzushozzaad" value="Kurzus felvétele">
</form>

<hr style="height:5px; border-width:0; color:#0076ab; background-color:#0076ab;">

<h2>Felvett kurzusok:</h2>

<table border="1">
<tr>
<th>Neptun kód</th>
<th>Név</th>
<th>Kurzuskód</th>
<th>Kurzus név</th>
</tr>

<?php

	$hallgatokurzus = hallgatokurzuslistatLeker(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($hallgatokurzus) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["neptun_kod"] .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["kurzuskod"] .'</td>';
		echo '<td>'. $egySor["kurzus_nev"] .'</td>';
		echo '<td><form method="POST" action="hallgatokurzustorles.php">
				  <input type="hidden" name="torolthkn" value="'.$egySor["neptun_kod"].'" />
				  <input type="hidden" name="torolthkk" value="'.$egySor["kurzuskod"].'" />
				  <input type="submit" value="törlés" />
		          </form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($hallgatokurzus); // töröljük a listát a memóriából

?>

</table>

	












</div>



</BODY>
</HTML>
