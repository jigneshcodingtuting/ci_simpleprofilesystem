<!DOCTYPE html>
<html>

	<head>
		<title> Login Form </title>
	</head>
	
	<body>
		
		<center>
		
			<h1> Login </h1>
			
			<?php
				
				if($this->uri->segment(3) == "wrong")
				{
					echo "<font color='red'> Incorrect Username & Password. Try again. </font><br><br>";
				}
				
				if($this->uri->segment(3) == "must_login")
				{
					echo "<font color='red'> You must Login first. </font><br><br>";
				}
				
				if($this->uri->segment(3) == "logged_out")
				{
					echo "<font color='green'> You have been Logged Out successfully. </font><br><br>";
				}
			
				if($this->uri->segment(3) == "som_wrong")
				{
					echo "<font color='red'> Something happened wrong. Try to Login again. </font><br><br>";
				}
			
			?>
			
			<form action="<?php echo base_url() ?>main/login" method="post">
			
				<table border cellspacing="" cellpadding="">
					
					<tr>
						<td align="right"> <b> Username </b> </td>
						<td> <input type="text" name="uname" value="" placeholder="Username" autofocus required> </td>
					</tr>
					
					<tr>
						<td align="right"> <b> Password </b> </td>
						<td> <input type="password" name="pass" value="" placeholder="Password" required> </td>
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
			
			<a href="<?php echo base_url() ?>main/signup"> Create New Account </a>
		
		</center>
		
	</body>

</html>