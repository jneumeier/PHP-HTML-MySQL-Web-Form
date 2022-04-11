<?php
	session_start();
	include 'database.php';
?>


<html>
	<head>
		<title>NFL Players</title>
	</head>
	 
	<body>
	 
		<?php 			
			$query = getTeamsAndPlayers();		 
		?>
		 
		<table>
			<tr>
				<td align="center">Name</td>
				<td align="center">Team</td>
			</tr>

			<!-- looping -->
			<?php 
				if($query != -1) {
					
					while( $row = $query->fetch_assoc() ) {
						echo "<tr>
								<td align=\"center\">" . $row["strFullName"] . "</td>
								<td align=\"center\">" . $row["strTeamName"] . "</td>
							</tr>";
					}
				} else { echo "Information not able to be retrieved."; }
					
				
				// $row = $query->fetch_assoc();
			?>
		 
		</table>
		
	</body>
</html>