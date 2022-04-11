 <?php
 
	// ------------------------------------------------------------------------------------
	// database.php
	// This document contains all methods that deal with database communication.
	// ------------------------------------------------------------------------------------
	
	
	
	
	// ------------------------------------------------------------------------------------
	// Name: updateTeamsTable
	// Abstract: Adds given team to the teams table, if the team does not already
	// 			 exist in the teams table. Creates a teams table if it does not exist.
	// ------------------------------------------------------------------------------------
	function updateTeamsTable($txtTeam) {
		
		// create database credentials
		$hostname = "sql105.epizy.com";
		$username = "epiz_31480832";
		$password = "rwvAosemnWwMFr";
		$dbname = "epiz_31480832_jonfoto";

		// Create connection
		$conn = new mysqli($hostname, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		// ---------------------------------------------------------------
		// Table (check if exists and create if necessary)
		
		// run query
		$checkIfTableExists = $conn->query("DESCRIBE TTeams");
		
		// if SQL gave no result at all
		if($checkIfTableExists == FALSE) {
			
			// create table
			$sql = "CREATE TABLE TTeams
					(
						 intTeamID		INTEGER			NOT NULL
						,strTeamName	VARCHAR(255)	NOT NULL
						,CONSTRAINT TTeams_PK PRIMARY KEY ( intTeamID ))";

			if ($conn->query($sql) === TRUE) {
				
				echo "Table TTeams created successfully <br>";
				
			} else {
				
				echo "Error creating table: " . $conn->error;
			}	   
		}
				
		// ------------------------------------------------------------------------------------
		// Team (check if exists and create if necessary)
		
		// create and run search query for the given team, and, save query result in variable		
		$checkIfTeamExists = $conn->query("SELECT * FROM TTeams WHERE strTeamName = '" . $txtTeam . "'");
			
		if($checkIfTeamExists == TRUE) {
			
			if ($checkIfTeamExists->num_rows == 0) {
			
				// count the number of records already in TTeams
				$sql = "SELECT COUNT(intTeamID) AS NumberOfTeams FROM TTeams";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$intNumberOfTeams = $row["NumberOfTeams"];
					
					// and then, increment so we have a valid primary key for the new team
					$intNumberOfTeams += 1;
				}
				
				// add team to TTeams
				$insert = "INSERT INTO TTeams (intTeamID, strTeamName)
						   VALUES 			  (" . $intNumberOfTeams . ", '" . $txtTeam . "')";

				if ($conn->query($insert) === TRUE) {
					
					echo "Team " . $txtTeam . " created successfully <br>";
					
				} else {
					
					echo "Error creating team: " . $conn->error;
				}
				
			} else {
				
				echo "The " . $txtTeam . " already exist. Adding players to this team. <br>";
			}		
		}
		
		// close connection
		$conn->close();	
	}
	
	
	
	// ------------------------------------------------------------------------------------
	// Name: updatePlayersTable
	// Abstract: Adds players to the given team's table, if the player does not already
	// 			 exist in the players table. Creates a players table if it does not exist.
	// ------------------------------------------------------------------------------------
	function updatePlayersTable($arrPlayers, $txtTeam) {
		
		// create database credentials
		$hostname = "sql105.epizy.com";
		$username = "epiz_31480832";
		$password = "rwvAosemnWwMFr";
		$dbname = "epiz_31480832_jonfoto";

		// Create connection
		$conn = new mysqli($hostname, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		// ---------------------------------------------------------------
		// Players (check if exists and create if necessary)
		// create and run search query for the given table, and, save query result in variable
		$checkIfTableExists = $conn->query("DESCRIBE TPlayers");
		
		if($checkIfTableExists == FALSE) {
			
			// create table and add foreign key to TPlayers child table
			$sql = "CREATE TABLE TPlayers
					(
						 intPlayerID	INTEGER			NOT NULL
						,intTeamID		INTEGER			NOT NULL
						,strFullName	VARCHAR(255)	NOT NULL
						,CONSTRAINT TPlayers_PK PRIMARY KEY ( intPlayerID ) 
						,CONSTRAINT TPlayers_TTeams_FK FOREIGN KEY (intTeamID) REFERENCES TTeams (intTeamID) );";
						
					

			if ($conn->query($sql) === TRUE) {
				
				echo "Table TPlayers created successfully <br>";
				
			} else {
				
				echo "Error creating table: " . $conn->error;
			}	   
		}
		
		// ---------------------------------------------------------------
		// get team ID from database using $txtTeam that was entered by the user
		$intTeamID = 0;
		
		// create and run search query for the given team name, and, save query result in variable
		$dbQueryResult = $conn->query("SELECT intTeamID FROM TTeams WHERE strTeamName = '" . $txtTeam . "'");
		
		// if SQL gave any result
		if($dbQueryResult == TRUE) {
			
			// if the query came up with zero results
			if ($dbQueryResult->num_rows > 0) {
			
				$row = $dbQueryResult->fetch_assoc();
					$intTeamID = $row["intTeamID"];
				
			} else {
				
				echo "Team ID not able to be retrieved. <br>";			
			}		
		}
		
			
		// ---------------------------------------------------------------
		// Player (check if exists and create if necessary)
		
		$intIndex = 0;
		
		// perform search actions for each player in the given array
		for($intIndex = 0; $intIndex < count($arrPlayers); $intIndex++) {
			
			// break from for loop if current player is empty (no others are expected after it, too)
			if($arrPlayers[$intIndex] == "") {
				
				continue;
			}
			
			// create and run search query for the given player, and, save query result in variable
			$checkIfPlayerExists = $conn->query("SELECT * FROM TPlayers WHERE strFullName = '" . $arrPlayers[$intIndex] . "'");
			
			// if SQL gave any result
			if($checkIfPlayerExists == TRUE) {
				
				// if the query came up with zero results
				if ($checkIfPlayerExists->num_rows == 0) {
				
					// count the number of records already in TPlayers to find new primary key possibility
					$sql = "SELECT COUNT(intPlayerID) AS NumberOfPlayers FROM TPlayers";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$intNumberOfPlayers = $row["NumberOfPlayers"];
						
						// and then, increment so we have a valid primary key for the new player
						$intNumberOfPlayers += 1;
					}
					
					// add player to TPlayers
					$insert = "INSERT INTO TPlayers (intPlayerID, intTeamID, strFullName)
							   VALUES 			  (" . $intNumberOfPlayers . ", " . $intTeamID . ", '" . $arrPlayers[$intIndex] ."')";

					if ($conn->query($insert) === TRUE) {
						
						echo "Player " . $arrPlayers[$intIndex] . " created successfully <br>";
						
					} else {
						
						echo "Error creating player: " . $conn->error;
					}
					
				} else {
					
					echo "Player " . $arrPlayers[$intIndex] . " already exists!!! <br>";				
				}		
			}		
		}
			
		// close connection
		$conn->close();	
	}
	
	
	
	// ------------------------------------------------------------------------------------
	// Name: getTeamsAndPlayers
	// Abstract: Retrieves a MySQL query that has players ordered by their team, then by
	//			 their name.
	// ------------------------------------------------------------------------------------
	function getTeamsAndPlayers() {
		
		// create database credentials
		$hostname = "sql105.epizy.com";
		$username = "epiz_31480832";
		$password = "rwvAosemnWwMFr";
		$dbname = "epiz_31480832_jonfoto";

		// Create connection
		$conn = new mysqli($hostname, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		
		// ---------------------------------------------------------------
		// Query for Teams and their Players
		
		//if query fails stop further execution and show mysql error
		$query = $conn->query("SELECT TPlayers.strFullName, TTeams.strTeamName
							  FROM TPlayers JOIN TTeams
							  ON TPlayers.intTeamID = TTeams.intTeamID
							  ORDER BY TTeams.strTeamName, TPlayers.strFullName")
				or die(mysql_error());
		 
		// close connection
		$conn->close();	
		 
		//if we get no results return -1
		if($query->num_rows <= 0) { $query = -1; }
		
		return $query;	
	}
?> 