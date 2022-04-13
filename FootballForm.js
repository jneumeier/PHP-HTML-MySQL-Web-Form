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
	});
	
	
	
	// when user selects "Enter New Team" in combo box
	document.getElementById("combobox").onchange = function () {
		var cboSelection = document.getElementById("combobox").value;
		
		if(cboSelection == "new-team") {
			
			var element = document.getElementById("new-team-textbox");
			
			// if input field doesn't already exist
			if(typeof(element) != 'undefined' && element != null){} else {
				
				// add input field
				$('.teamInputTable').append(`
					<tr id="new-team-textbox" class="new-team-textbox">
						<td height=35px>NFL Team:</td>
						<td> <input type="text" value="" name="txtTeam"></td>
					</tr>
				`);	
			}
		} else {
			
			$('.new-team-textbox').remove();
		}
	};
});