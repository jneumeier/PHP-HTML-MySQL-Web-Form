<?php
	session_start();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Football Team Entry Form</title>
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
					<td>NFL Team #1:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam1"] ?>" name="txtTeam1"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #2:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam2"] ?>" name="txtTeam2"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #3:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam3"] ?>" name="txtTeam3"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #4:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam4"] ?>" name="txtTeam4"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #5:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam5"] ?>" name="txtTeam5"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #6:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam6"] ?>" name="txtTeam6"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #7:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam7"] ?>" name="txtTeam7"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #8:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam8"] ?>" name="txtTeam8"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #9:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam9"] ?>" name="txtTeam9"></td>
					</td>
				</tr>
				<tr>
					<td>NFL Team #10:</td>
					<td> <input type="text" value="<?php echo $_SESSION["txtTeam10"] ?>" name="txtTeam10"></td>
					</td>
				</tr>
				
				<tr>
					<td align="center" colspan=2><input type="submit"></td>
				</tr>
			</table>
		</form>
	</body>
</html> 