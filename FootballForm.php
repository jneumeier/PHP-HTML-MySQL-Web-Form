<?php
	session_start();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Football Player Entry Form</title>
	</head>
	<body>
		<br>
		<form action="process_blank.php" method="post">
			<table border=1>
				<tr>
					<td width= 50% >Form Date:</td>
					<td>  <input type="date" value="<?php echo $_SESSION["formDate"] ?>" name="formDate" id="formDate" class="datePicker">
					<!-- $date = new EJ\DatePicker("datePicker");
							echo $date->value(new DateTime())->render(); -->
				</tr>
				<tr>
					<td>NFL Team:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam"] ?>" name="txtTeam"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #1:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer1"] ?>" name="txtPlayer1"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #2:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer2"] ?>" name="txtPlayer2"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #3:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer3"] ?>" name="txtPlayer3"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #4:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer4"] ?>" name="txtPlayer4"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #5:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer5"] ?>" name="txtPlayer5"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #6:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer6"] ?>" name="txtPlayer6"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #7:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer7"] ?>" name="txtPlayer7"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #8:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer8"] ?>" name="txtPlayer8"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #9:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer9"] ?>" name="txtPlayer9"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Player #10:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtPlayer10"] ?>" name="txtPlayer10"></td>
					</td>
				</tr>
				
				<tr>
					<td align="center" colspan=2><input type="submit"></td>
				</tr>
			</table>
		</form>
	</body>
</html> 