<?php

	session_start();
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
			$txtTeam1 =  $_POST["txtTeam1"];
			$txtTeam2 =  $_POST["txtTeam2"];
			$txtTeam3 = $_POST["txtTeam3"];
			$txtTeam4 =  $_POST["txtTeam4"];
			$txtTeam5 = $_POST["txtTeam5"];
			$txtTeam6 =  $_POST["txtTeam6"];
			$txtTeam7 = $_POST["txtTeam7"];
			$txtTeam8 = $_POST["txtTeam8"];
			$txtTeam9 =  $_POST["txtTeam9"];
			$txtTeam10 = $_POST["txtTeam10"];
			
			# put variables into an array
			$arrTeams = array($txtTeam1, $txtTeam2, $txtTeam3, $txtTeam4, $txtTeam5, $txtTeam6, $txtTeam7, $txtTeam8, $txtTeam9, $txtTeam10);
			
			# create variables for For loop functioning
			$intIndex = 0;
			$arrlength = count($arrTeams);
			
			# output to user
			echo "Form Date:  " . $formDate;
			echo "<br><br>";
			
			for($intIndex = 0; $intIndex < $arrlength; $intIndex++)
			{
			  echo "Baseball Team #" . ($intIndex + 1) . " is the " . $arrTeams[$intIndex];
			  echo "<br><br>";
			}		

			$_SESSION["formDate"] = $formDate;
			$_SESSION["txtTeam1"] = $txtTeam1;
			$_SESSION["txtTeam2"] = $txtTeam2;
			$_SESSION["txtTeam3"] = $txtTeam3;
			$_SESSION["txtTeam4"] = $txtTeam4;
			$_SESSION["txtTeam5"] = $txtTeam5;
			$_SESSION["txtTeam6"] = $txtTeam6;
			$_SESSION["txtTeam7"] = $txtTeam7;
			$_SESSION["txtTeam8"] = $txtTeam8;
			$_SESSION["txtTeam9"] = $txtTeam9;
			$_SESSION["txtTeam10"] = $txtTeam10;
		?>

		<a href="FootballForm.php" target="_self">Modify Data</a> <br>

	</body>
</html> 