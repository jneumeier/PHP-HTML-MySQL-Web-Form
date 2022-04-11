<?php
	session_start();
	require 'styles.css';
?>



<html>

	<head>
		<meta charset="utf-8">
		<title>Football Player Entry Form</title>			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
	</head>
	
	<body>	
		<br>		
		<form action="process_blank.php" method="post">
			<table class="playerInputTable" border=1>
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
					<td>Player #1:</td>
					<td> <input type="text" name="txtPlayer1"></td>
					<td align="center" colspan=1><button class="btn add-btn">Add More</button></td>
				</tr>
			</table>
			
			<table style="width:478px" border=1>
				<tr>
					<td align="center" colspan=3><input type="submit" class="btn" value="Submit"></td>
				</tr>
			</table>
		</form>
		
		
		<script type="text/javascript">
		
			$(document).ready(function () {
		 
				// allowed maximum input fields
				var intMaxInput = 10;

				// initialize the counter for textbox
				var intIndex = 1;

				// handle click event on Add More button
				$('.add-btn').click(function (e) {
				  
					e.preventDefault();

					// if counter is less than max allowed inputs, then create another input
					if (intIndex < intMaxInput) {
						
						intIndex++; // increment the counter
						
						// add input field
						$('.playerInputTable').append(`
							<tr>
								<td>Player #` + intIndex + `:</td>
								<td><input type="text" name="txtPlayer` + intIndex + `"> </td>
								<td align="center" class="remove-lnk"><button class="btn">Remove</button></td>						
							</tr>				
						`);
					}
				});

				// handle click event of the remove link
				$('.playerInputTable').on("click", ".remove-lnk", function (e) {
					
					e.preventDefault();
					
					$(this).parent('tr').remove();  // remove input field
					
					intIndex--; // decrement the counter
				})		 
			});
			
		</script>
		
	</body>
</html> 