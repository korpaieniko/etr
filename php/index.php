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
	<a href="index.php" id="aktualis"> Főoldal</a>
	<a href="kurzusok.php"> Kurzusok</a>
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
			font-weight: bold; font-family: Monaco, monospace; ">
	<p>ETR tanulmányi rendszer</p>
</div>
<hr style="height:5px; border-width:0; color:#0076ab; background-color:#0076ab;">

<!--Tartalom-->
<div style="display: inline-block;">
<h2>Hány kurzust tartanak az oktatók?</h2>

<table>
<tr>
<th>Neptun kód</th>
<th>Név</th>
<th>Kurzusok száma</th>
</tr>

<?php
	$lista = oktatok_orai();
	
	foreach( $lista as $egySor) { 
		echo '<tr>';
		echo '<td>'. $egySor["neptun_kod"] .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["db"] .'</td>';
		echo '</tr>';
	}

?>

</table>
</div>

<div style="display: inline-block; padding-left: 55px;">
<h2>Hány kurzust vettek fel a hallgatók?</h2>

<table>
<tr>
<th>Neptun kód</th>
<th>Név</th>
<th>Kurzusok száma</th>
</tr>

<?php
	$lista = hallgatok_orai();
	
	foreach( $lista as $egySor ) {
		echo '<tr>';
		echo '<td>'. $egySor["neptun_kod"] .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["db"] .'</td>';
		echo '</tr>';
	}

?>

</table>
</div>

<div style="display: inline-block;">
<h2>Hány hallgató vette fel az oktatók kurzusait összesen?</h2>

<table>
<tr>
<th>Neptun kód</th>
<th>Név</th>
<th>Hallgatók száma</th>
</tr>

<?php
	$lista = oktatok_fo();
	
	foreach( $lista as $egySor ) {
		echo '<tr>';
		echo '<td>'. $egySor["neptun_kod"] .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["fo"] .'</td>';
		echo '</tr>';
	}

?>

</table>
</div>


<div style="display: inline-block; padding-left: 55px;">
<h2>Melyik oktató kurzusait nem vette fel egy hallgató sem?</h2>

<table>
<tr>
<th>Neptun kód</th>
<th>Név</th>
<th>Kurzus kódja</th>
<th>Kurzus neve</th>
</tr>

<?php
	$lista = oktatok_nulla();
	
	foreach( $lista as $egySor ) {
		echo '<tr>';
		echo '<td>'. $egySor["neptun_kod"] .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["kurzuskod"] .'</td>';
		echo '<td>'. $egySor["kurzus_nev"] .'</td>';
		echo '</tr>';
	}

?>

</table>
</div>


</div>




</BODY>
</HTML>
