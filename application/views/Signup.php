<!DOCTYPE html>
<html>

	<head>
		<title> Sign Up </title>
	</head>
	
	<body>
		
		<center>
		
			<h1> Create New Account </h1>
			
			<?php
				if($this->uri->segment(3) == "pmismatch")
				{
					echo "<font color='red'> New Password & Confirm Password is mismatch with each other. Try again. </font><br><br>";
				}
				
				if($this->uri->segment(3) == "signup_done")
				{
					echo "<font color='green'> Account has been created successfully. </font><br><br><br>";
				}
				
				if($this->uri->segment(3) == "signup_fail")
				{
					echo "<font color='red'> Account has not been created . Try again. </font><br><br><br>";
				}
			?>
			
			<form action="<?php echo base_url() ?>main/signing_up" method="post">
			
				<table border cellspacing="" cellpadding="">
					
					<tr>
						<td align="right"> <b> First Name </b> </td>
						<td> <input type="text" name="fname" value="" placeholder="First Name" autofocus required> </td>
					</tr>
					
					<tr>
						<td align="right"> <b> Last Name </b> </td>
						<td> <input type="text" name="lname" value="" placeholder="Last Name" required> </td>
					</tr>
					
					<tr>
						<td align="right"> <b> Gender </b> </td>
						<td>
							<input type="radio" name="gen" value="Male"> Male
							<input type="radio" name="gen" value="Female"> Female
						</td>	
					</tr>
					
					
					<tr>
						<td align="right"> <b> Username </b> </td>
						<td> <input type="text" name="uname" value="" placeholder="Username" required> </td>
					</tr>
					
					<tr>
						<td align="right"> <b> New Password </b> </td>
						<td> <input type="password" name="ps" value="" placeholder="New Password" required> </td>
					</tr>
					
					<tr>
						<td align="right"> <b> Confirm Password </b> </td>
						<td> <input type="password" name="cps" value="" placeholder="Confirm Password" required> </td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="submit" value="Send"> &nbsp;&nbsp;
							<input type="reset" name="reset" value="Cancel">
						</td>	
					</tr>
					
				</table>
			
			</form>
			
			<br><br>
			
			Or
			
			<br><br>
			
			<p> Already have Account ? <a href="<?php echo base_url() ?>main/index"> Login </a> </p>
		
		</center>
		
	</body>

</html>