<?php
	session_start();
	require 'database.php';
	require 'styles.css';
?>

<html>
	<head>
		<title>NFL Players</title>
	</head>
	 
	<body id="usa-gradient">
	
		<span style="font-size:40px;">NFL Teams and Players</span>
		<span style="color:red;font-size:9px;">.......that you entered!</span>
	 
		<br><br>
	 
		<?php 			
			$query = getTeamsAndPlayers();		 
		?>

			<!-- looping -->
			<?php 
				
				$intIndex = 0;
				$intTablesInARow = 0;
				$strTeam = "";
			
				if($query != -1) {
					
					while( $row = $query->fetch_assoc() ) {
						
						// Check if the team has changed, if so, close the table already being made,
						// and reset the index counter. This only gets checked after the very first iteration.
						if($intIndex != 0) {
						
							// if the team from last iteration doesn't match the currently iterated row from the query
							if($strTeam !== $row["strTeamName"]) {
							
								$intIndex = 0;
								
								echo "</table>";
							}						
						}
						
						if($intIndex == 0) { 
						
							// Save the current team in variable, so we can check it against the new row at
							// the start of the next iteration.
							$strTeam = $row["strTeamName"];
						
							// start the table
							echo "<table class=\"table-padding\" style=\"display: inline-table; vertical-align: top;\" border=1 width=15%>";
						
							echo "<tr> <td width=15% align=\"center\"><h2>" . $row["strTeamName"] . "</h2></td> </tr>";							
						}
						
						echo "<tr> <td align=\"right\">" . $row["strFullName"] . "</td> </tr>";
							
						$intIndex++;
					}
					
					// Last table not closed, due to while loop ending before it can go back and close it. Closing here.
					echo "</table>";
					
				} else { echo "Information not able to be retrieved."; }
					
			?>
				
		
		
		<button class="btn-selections" style="display: block;" onclick="window.location.href='FootballForm.php';">Return to Form</button>
		
	</body>
</html>