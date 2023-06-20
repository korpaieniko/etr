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

<h2>Terem adatainak módosítása:</h2>

<?php
	$teremnev = $_POST["mterem"];
	$teremnev_eredeti = $_POST["mterem"];
	$teremadat = teremadatot_leker($teremnev);
?>




<form method="POST" action="teremmodositas.php" accept-charset="utf-8">
	<label>Terem neve:</label>
	<?php
	echo '<input type="text" name="teremnev" value="'.$teremnev.'"><br>';
	?>
	<label>Címe:</label>
	<?php
	echo '<input type="text" name="cim" value="'.$teremadat["cim"].'"><br>';
	?>
	<label>Épület neve:</label>
	<?php
	echo '<input type="text" name="epulet" value="'.$teremadat["epulet"].'"><br>';
	?>
	<label>Emelet:</label>
	<?php
	echo '<input type="text" name="emelet" value="'.$teremadat["emelet"].'"><br>';
	?>
	<label>Ajtó száma:</label>
	<?php
	echo '<input type="text" name="ajto_szama" value="'.$teremadat["ajto_szama"].'"><br>';
	?>
	<label>Típusa:</label>
	<?php
	echo '<input type="text" name="tipus" value="'.$teremadat["tipus"].'"><br>';
	?>
	<label>Férőhely:</label>
	<?php
	echo '<input type="text" name="ferohely" value="'.$teremadat["ferohely"].'"><br>';
	?>
	<?php
	echo '<input type="hidden" name="mterem" value="'.$teremnev_eredeti.'" />';
	?>
	<input type="submit" name="teremmodosit" value="Terem adatainak módosítása">
</form>


</div>

</BODY>
</HTML>
