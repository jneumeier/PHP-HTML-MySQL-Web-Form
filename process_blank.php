<?php

	session_start();
	require 'database.php';
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Form Processed</title>
	</head>
	<body>
		<?php
			# pull variables from entry form
			$formDate =  $_POST["formDate"];
			$txtTeam =  $_POST["txtTeam"];
			$txtPlayer1 =  $_POST["txtPlayer1"];
			$txtPlayer2 =  $_POST["txtPlayer2"];
			$txtPlayer3 = $_POST["txtPlayer3"];
			$txtPlayer4 =  $_POST["txtPlayer4"];
			$txtPlayer5 = $_POST["txtPlayer5"];
			$txtPlayer6 =  $_POST["txtPlayer6"];
			$txtPlayer7 = $_POST["txtPlayer7"];
			$txtPlayer8 = $_POST["txtPlayer8"];
			$txtPlayer9 =  $_POST["txtPlayer9"];
			$txtPlayer10 = $_POST["txtPlayer10"];
			
			# put variables into an array
			$arrPlayers = array($txtPlayer1, $txtPlayer2, $txtPlayer3, $txtPlayer4, 
								$txtPlayer5, $txtPlayer6, $txtPlayer7, $txtPlayer8, 
								$txtPlayer9, $txtPlayer10);
			
			
			# MySQL database updates (methods contained in database.php)
			updateTeamsTable($txtTeam);			
			updatePlayersTable($arrPlayers, $txtTeam);
			
					
			# output to user
			# create variables for For loop functioning
			$intIndex = 0;
			$arrlength = count($arrPlayers);
			
			# print to user
			echo "Form Date:  " . $formDate;
			echo "<br><br>";
			
			echo "Team Name:  " . $txtTeam;
			echo "<br><br>";
			
			for($intIndex = 0; $intIndex < $arrlength; $intIndex++)
			{
			  echo "Team Player #" . ($intIndex + 1) . " is the " . $arrPlayers[$intIndex];
			  echo "<br><br>";
			}		

			$_SESSION["formDate"] = $formDate;
			$_SESSION["txtTeam"] = $txtTeam;
			$_SESSION["txtPlayer1"] = $txtPlayer1;
			$_SESSION["txtPlayer2"] = $txtPlayer2;
			$_SESSION["txtPlayer3"] = $txtPlayer3;
			$_SESSION["txtPlayer4"] = $txtPlayer4;
			$_SESSION["txtPlayer5"] = $txtPlayer5;
			$_SESSION["txtPlayer6"] = $txtPlayer6;
			$_SESSION["txtPlayer7"] = $txtPlayer7;
			$_SESSION["txtPlayer8"] = $txtPlayer8;
			$_SESSION["txtPlayer9"] = $txtPlayer9;
			$_SESSION["txtPlayer10"] = $txtPlayer10;
		?>

		<a href="FootballForm.php" target="_self">Modify Data</a> <br>

	</body>
</html> 