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
	<a href="termek.php" > Termek</a>
	<a href="hallgatok.php" > Hallgatók</a>
	<a href="oktatok.php" > Oktatók</a>
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

<h2>Kurzus adatainak módosítása:</h2>

<?php
	$kurzuskod = $_POST["mkurzus"];
	$kurzusadat = kurzusadatot_leker($kurzuskod);
?>




<form method="POST" action="kurzusmodositas.php" accept-charset="utf-8">
	<label>Kurzus kódja:</label>
	<?php
	echo '<input type="text" name="kurzuskod" value="'.$kurzuskod.'" readonly="readonly"><br>';
	?>
	<label>Neve:</label>
	<?php
	echo '<input type="text" name="kurzus_nev" value="'.$kurzusadat["kurzus_nev"].'"><br>';
	?>
	<label>Típusa:</label>
	<?php
	echo '<input type="text" name="tipus" value="'.$kurzusadat["tipus"].'"><br>';
	?>
	<label>Aktuális létszám:</label>
	<?php
	echo '<input type="text" name="aktualis_letszam" value="'.$kurzusadat["aktualis_letszam"].'"><br>';
	?>
	<label>Max létszám:</label>
	<?php
	echo '<input type="text" name="max_letszam" value="'.$kurzusadat["max_letszam"].'"><br>';
	?>
	<label>Kredit:</label>
	<?php
	echo '<input type="text" name="kredit" value="'.$kurzusadat["kredit"].'"><br>';
	?>
	<label>Kezdési időpont:</label>
	<?php
	echo '<input type="text" name="kezdesi_idopont" value="'.$kurzusadat["kezdesi_idopont"].'"><br>';
	?>
	<label>Időtartam:</label>
	<?php
	echo '<input type="text" name="idotartam" value="'.$kurzusadat["idotartam"].'"><br>';
	?>
	<label>Terem neve:</label>
	<?php
	echo '<input type="text" name="teremnev" value="'.$kurzusadat["teremnev"].'"><br>';
	?>
	<input type="submit" name="kurzusmodosit" value="Kurzus adatainak módosítása">
</form>











</div>



</BODY>
</HTML>
