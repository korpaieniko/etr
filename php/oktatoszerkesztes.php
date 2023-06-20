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
	<a href="oktatok.php" id="aktualis"> Oktatók</a>
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

<h2>Oktató adatainak módosítása:</h2>

<?php
	$oneptun_kod = $_POST["moktato"];
	$oktatoadat = oktatoadatot_leker($oneptun_kod);
?>




<form method="POST" action="oktatomodositas.php" accept-charset="utf-8">
	<label>Neptun kódja:</label>
	<?php
	echo '<input type="text" name="oneptun_kod" value="'.$oneptun_kod.'" readonly="readonly"><br>';
	?>
	<label>Neve:</label>
	<?php
	echo '<input type="text" name="onev" value="'.$oktatoadat["onev"].'"><br>';
	?>
	<label>Születési ideje:</label>
	<select name="szulev" />
	<?php
		for ($i=1900; $i<2022; $i++) {
			if( $oktatoadat["ev"] == $i ){
				echo '<option value="'.$i.'"selected>'.$i.'</option>';
			} else {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
			
		}
	?>
	</select> év &nbsp;

	<select name="szulhonap" />
	<?php
		for ($i=1; $i<12; $i++) {
			if( $oktatoadat["honap"] == $i ){
				echo '<option value="'.$i.'"selected>'.$i.'</option>';
			} else {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
		}
	?>
	</select> hónap

	<select name="szulnap" />
	<?php
		for ($i=1; $i<31; $i++) {
			if( $oktatoadat["nap"] == $i ){
				echo '<option value="'.$i.'"selected>'.$i.'</option>';
			} else {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
		}
	?>
	</select> nap <br>
	<label>Intézetének neve:</label>
	<?php
	echo '<input type="text" name="intezet_neve" value="'.$oktatoadat["intezet_neve"].'"><br>';
	?>
	<label>Irodájának címe:</label>
	<?php
	echo '<input type="text" name="iroda_cime" value="'.$oktatoadat["iroda_cime"].'"><br>';
	?>
	<input type="submit" name="oktatomodosit" value="Oktató adatainak módosítása">
</form>











</div>



</BODY>
</HTML>
