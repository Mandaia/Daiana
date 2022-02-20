<!DOCTYPE html>
<html>
	<head>
		<style>
			body {
			background-image: url('wallpaper.jpg');
			background-repeat: no-repeat;
			background-position: right top;
			}
		</style>

	<link rel="stylesheet" type="text/css" href="index.css">

			<title>PigeON</title>
	</head>
<body>


	<table>
		<tr colspan=2 rowspan=2>
			<td class="logo"> </td>
			<td class style="font-size:55px;font-family: cooper black; font-weight: bold;color:#cc3399;"> PigeON </td>
		</tr>
	</table>


	<table align="center">
		<tr>
			<th colspan=3 rowspan=3></th>
		</tr>
			<td>

<table align="left" border=0 cellpadding=2 cellspacing=2 style="margin-left: -20px;">
	<form action="login.php" method="post">

	<tr>
		<td colspan=2 align=center><font size=5 style="color:white;"><b><i>Conectează-te</i></b></font>
	</tr>

	<tr><td><br></td></tr>

	<tr>
		<td align=right><font size=4 style="color:white">Adresa de e-mail</font></td>
		<td><input type="text" name="email" id="adrmail" size=30></td>
	</tr>

	<tr>
		<td align=right><font size=4 style="color:white">Parola</font></td>
		<td><input type="password" name="password" id="pass" size=30></td>
	</tr>

	<tr>
		<td></td>
		<td align=center><font size=4><b><input type="submit" value="Intră" style="width: 100px;"></font></td>
	</tr>
			</td>
</form>
</table>

<td></td>

	<td>
<table align="right" border=0 cellpadding=8 cellspacing=2 style="border-left: 0px solid white; margin-left: 230px;">
<form action="server.php" method="post">

	<tr>
		<td colspan=2 align=right><font size=5 style="color:white"><b><i>Nu ai un cont? Înregistrează-te</i></b></font>
	</tr>

	<tr>
		<td align=right style="color:white"><font size=4>Numele </font></td>
		<td><input type="text" name="nume" required size=30></td>
	</tr>
	<tr>
		<td align=right style="color:white"><font size=4>Prenumele </font></td>
		<td><input type="text" name="prenume" required size=30></td>
	</tr>

	<tr>
		<td align=right style="color:white"><font size=4>Data nașterii</font></td>
		<td><input type="text" name="dtNastere" required size=20></td>
	</tr>

	<tr>
		<td align=right style="color:white"><font size=4>Sexul</font></td>
			<td>
				<font size=4 style="color:white">
			<select name="selectbox">
				<option name="masculin" value="masculin">Masculin</option>
				<option name="feminin" value="feminin">Feminin</option>
				<option name="divers" value="divers">Divers</option>
			</select>
				</font>
			</td>
	</tr>


	<tr>
		<td align=right><font size=4 style="color:white">Adresa de e-mail</font></td>
		<td><input type="text" name="email" required size=30></td>
	</tr>

	<tr>
		<td align=right><font size=4 style="color:white">Parola</font></td>
		<td><input type="password" name="password" required size=30></td>
	</tr>

	<tr>
		<td align=right><font size=4 style="color:white">Locatie</font></td>
		<td><input type="text" name="locatie" required size=30></td>
	</tr>


	<tr>
		<td align=center><font size=4><input type="reset" value="Anulează"></font></td>
		<td align=center><font size=4><b><button type="submit" name="inreg" value="inreg">Înregistrează</button></font></td>
			<td align=center><font size=3 style="color:#f8f8f8">Prin înregistrare sunteți
			<br>de acord cu Termenii,
			<br>Condițiile de Utilizare și
			<br>Politica de Confidențialitate. </font></td>
	</tr>

</table>
</table>

</body>
</html>
