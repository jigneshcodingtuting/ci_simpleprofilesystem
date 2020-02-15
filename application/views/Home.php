<?php

	if($this->session->userdata("id") != null)
	{
		$title = "Home";
		
		include("head.php");
		
		foreach($profile as $row)
		{
		?>
	
			<h1> My Profile </h1>
			
			<table border cellspacing="" cellpadding="">
				
				<tr>
					<td align="right"> <b> Name </b> </td>
					<td> <?php echo $row->fname. " ". $row->lname; ?> </td>
				</tr>
				
				<tr>
					<td align="right"> <b> Gender </b> </td>
					<td> <?php echo $row->gen; ?> </td>
				</tr>
				
				<tr>
					<td align="right"> <b> Username </b> </td>
					<td> <?php echo $row->email; ?> </td>
				</tr>
				
			</table>
	
		<?php
			include("footer.php");
		}
	}
	
	else
	{
		redirect(base_url()."main/index/must_login");
	}

?>