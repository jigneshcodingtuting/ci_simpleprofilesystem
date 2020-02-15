<?php

	if($this->session->userdata("id") != null)
	{
		$title = "Edit";
		
		include("head.php");
		
		foreach($edit_data as $row)
		{?>
			
			<h1> Edit Profile </h1>
			
			<?php
			
				if($this->uri->segment(3) == "update_done")
				{
					echo "<font color='green'> Profile has been updated successfully. </font><br><br>";
				}
			
			?>
			
			<form action="<?php echo base_url() ?>main/update" method="post">
			
				<table border cellspacing="" cellpadding="">
					
					<tr>
						<td align="right"> <b> First Name </b> </td>
						<td> <input type="text" name="fname" value="<?php echo $row->fname; ?>" placeholder="First Name" autofocus required> </td>
					</tr>
					
					<tr>
						<td align="right"> <b> Last Name </b> </td>
						<td> <input type="text" name="lname" value="<?php echo $row->lname; ?>" placeholder="Last Name"required> </td>
					</tr>
					
					<tr>
						<td align="right"> <b> Gender </b> </td>
						<td> 
							<input type="radio" name="gen" value="Male" <?php if($row->gen == "Male"){echo "checked";} ?> required> Male
							<input type="radio" name="gen" value="Female" <?php if($row->gen == "Female"){echo "checked";} ?>> Female
						</td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="submit" value="Send"> &nbsp;&nbsp;
							<input type="reset" name="reset" value="Cancel">
						</td>	
					</tr>
					
				</table>
			
			</form>
			
		<?php
		}
		
		include("footer.php");
	}

?>