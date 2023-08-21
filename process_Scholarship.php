<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scholarship Form</title>
</head>
<body style = "background-color: peachpuff;">
	<?php 
		$firstName = $_POST["fName"];
		$lastName = $_POST["lName"];

		// definition of the displayRequired() function
		function displayRequired($fieldName) {
			echo "The field is \"$fieldName\" is required.<br/>";
		} // end of displayRequired

		// definition of the validateInput() function
		function validateInput($data, $fieldName) {
			global $errorCount;
			if(empty($data)) {
				displayRequired($fieldName);
				++$errorCount;
				$retval = "";
			} else {
				$retval = trim($data);
			} // end of else statement 
			return $retval;
		} // end of validateInput

		// Definition of the redispalyForm() function
		function redisplayForm($firstName, $lastName) {
			?> 
		<h2 style = "color: black; text-align: center; font-size: 2.5em;">Scholarship Form</h2>
		<form name="scholarship" action="process_Scholarship.php" method="post">
			<label for="first">First Name:</label>		
			<input type="text" name="fName" id="first" value="<?php echo $firstName; ?>" />
			<br/>
			<br/>
			<label for="last">Last Name:</label>
			<input type="text" name="lName" id="last" value="<?php echo $lastName; ?>"/>
			<br/>
			<br/>
			<p><input type="reset" value="Clear Form" /> &nbsp; &nbsp;<input type="submit" name="Submit" value="Send Form" /></p>
		</form>
		<?php 
		} // end of redisplayForm()


		$errorCount = 0;
		$firstName = validateInput($_POST["fName"], "First Name");
		$lastName = validateInput($_POST["lName"], "Last Name");

		if($errorCount > 0) {
			echo "<p style='color: red;'> Please re-enter the information below!</p>";
			redisplayForm($firstName, $lastName);
		} else {
			echo "<h3> Thank you for filling out the scholarship form, $firstName $lastName!</h3>";
		}// end of else statement
	 ?>
</body>
</html>
