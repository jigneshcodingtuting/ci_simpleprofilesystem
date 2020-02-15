<?php

	if($this->session->userdata("id") != null)
	{
		$title = "All Profiles";
		
		include("head.php");
	?>
		
		<h1> All Profiles </h1>
		
		<?php
		
			if($this->uri->segment(3) == "deleted")
			{
				echo "<font color='green'> Profile has been deleted succcessfully. </font><br><br>";
			}
		
		?>
		
		<table border cellspacing="" cellpadding="" width="100%">
		
			<tr>
				<td align="center"> <b> ID </b> </td>
				<td align="center"> <b> First Name </b> </td>
				<td align="center"> <b> Last Name </b> </td>
				<td align="center"> <b> Gender </b> </td>
				<td align="center"> <b> Delete </b> </td>
			</tr>
			
		<?php	
			foreach($all_pro->result() as $row)
			{?>
				<tr>
					<td align="center"> <?php echo $row->id; ?> </td>
					<td align="center"> <?php echo $row->fname; ?> </td>
					<td align="center"> <?php echo $row->lname; ?> </td>
					<td align="center"> <?php echo $row->gen; ?> </td>
					<td align="center">
						<a href="<?php echo base_url()."main/delete/".$row->id; ?>">
							<font color='red'> Delete </font>
						</a>
					</td>
				</tr>
			<?php
			}
		?>	
	
		</table>
		
	<?php	
		include("footer.php");
	}
	
	else
	{
		redirect(base_url()."main/index/must_login");
	}

?>