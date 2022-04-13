<?php
	session_start();
	require 'styles.css';
	require 'database.php';
?>



<html>

	<head>
		<meta charset="utf-8">
		<title>Football Player Entry Form</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="FootballForm.js"></script>
	</head>
	
	<body id="usa-gradient">	
		<span style="font-size:40px;">NFL Player Entry Form</span>
		<span style="color:red;font-size:15px;">.......using PHP, JavaScript/JQuery, MySQL, HTML, and CSS!!!</span>
		<br>		
		<form action="process_blank.php" method="post">
			<table width= 35% class="teamInputTable" border=1>
				<tr>
					<td width= 35% height=35px>Form Date:</td>
					<td><input type="date" width=35% value="<?php echo $_SESSION["formDate"] ?>" name="formDate" id="formDate" class="datePicker">
				</tr>
				<tr>
					<td height=35px>Select Existing Team:</td>
					<td>
						<select name="combo-box" id="combobox">
							<?php
								$arrTeams = getTeams();
								foreach($arrTeams as $arrTeam) {
									echo "<option value=" . $arrTeam . ">" . $arrTeam . "</option>";
								}
							?>
							<option id="new-team" value="new-team">Enter New Team</option>
						</select>
					</td> 
				</tr>
			</table>
			<table width= 35% class="playerInputTable" border=1>
				<tr>
					<td width= 35% height=35px>Player #1:</td>
					<td> <input type="text" name="txtPlayer1"></td>
					<td align="center" colspan=1><button class="btn add-btn">Add More</button></td>
				</tr>
			</table>
			
			<table width= 35% border=1>
				<tr>
					<td align="center" colspan=3 height=35px>
						<input type="submit" class="btn-selections" value="Submit">
						<button type="submit" class="btn-selections" formaction="displayPlayers.php">View Player Database</button>
					</td>
				</tr>
			</table>
		</form>		
	</body>
</html> 