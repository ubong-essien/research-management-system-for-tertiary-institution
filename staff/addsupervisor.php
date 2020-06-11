<?php
error_reporting(0);
include('../includes/admin_header.php');
?>
<div class="container">
	<div class="row" style="margin-top:70px">
		<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading"></div>
					<div class="panel-body">
					<form action="addsupervisor.php" method="POST">
						<label class="input-group-addon">Title</label>
						<select name="title" class="form-control" id="prog" required >
						<option value="" >-please select-</option>
						<option value="Mr" >Mr</option>
						<option value="Mrs" >Mrs</option>
						<option value="Dr" >Dr</option>
						<option value="Professor" >Professor</option>
						<option value="Miss" >Miss</option>
						<option value="Chief" >Chief</option>
						</select>
						<label class="input-group-addon">Supervisor's Name</label>
						<input type="" name="s_name" class="form-control" />
						  <label class="input-group-addon">Department</label>
							<select name="dpt" class="form-control" id="prog" required >
								<option value="" >-please select-</option>
				
								  <?php
							
									$sel = mysqli_query($con,"SELECT * FROM programme_tb");	
									if($sel){
									while($row=mysqli_fetch_array($sel)){
										$pid=$row['ProgID'];
										$p_name=$row['ProgName'];
										?>
										<option  value='<?php echo $row['ProgID'];?>'> <?php echo $row['ProgName'];?> </option>
										<?php
										}
									
								}
								else
								{echo"cant run query";
								}
							?>
									</select>
						   <label class="input-group-addon">Email Address</label>
							<input type="email" class="form-control" name="email" required />
							</div>
							 <div class="panel-footer">
							 <br/>
							<input type="submit" class="btn btn-primary " name="add" value="Add Supervisor"/>
							</div> 
					</form>
			</div>
			<?php
				if(!empty(mysqli_real_escape_string($con,(trim($_POST['add']))))){
						$s_name=mysqli_real_escape_string($con,(trim($_POST['s_name'])));
						$email=mysqli_real_escape_string($con,(trim($_POST['email'])));
						$title=mysqli_real_escape_string($con,(trim($_POST['title'])));
						$dpt=mysqli_real_escape_string($con,(trim($_POST['dpt'])));
						
						 $fields=array(
						'Title' =>$title,
						'Supervisor_name' =>$s_name,
						'ProgId' =>$dpt,
						'email' =>$email
			
									);
			$updt=Insert2DbTb($con,$fields,"supervisors");
			if($updt):
			echo "<br/><br/><span class='alert alert-success'>Record Added Successfully!</span>";
			else:
			echo "<br/><br/><span class='alert alert-danger'>error!</span>";
			endif;
				}
			?>
		</div>
	</div>
</div>