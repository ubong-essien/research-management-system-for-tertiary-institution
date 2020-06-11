<?php
error_reporting(0);
include('../includes/admin_header.php');
include('../includes/connect.php');
/* 
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=example.csv');
header('Pragma: no-cache'); */

//checkprev($_SESSION['user'],$_SESSION['prev'],'2');//check for priviledge */
$counter=1;
//echo $settings['report_criteria'];
$search_criteria="";

		
 ?>

<script type="text/javascript">

/*  $(document).ready(function(){
    $('#report').DataTable({
        
		"order": [[ 0, "asc" ]]
    });


}); */ 
</script>

<div class="container" style="margin-top:70px;">
	
				        
				<div class="row">
				<div class="col-md-12 col-lg-12">
				<div class="panel panel-primary">
				<div class="panel-heading hidden-print">
				
				<table width="100%">
				
						<tr>
						<form action="viewsubbydept.php" method="post">
						<td style="width:5%;">
						<label>Department:</label>
						</td>
						<td style="width:30%;">
							
                <select name="dpt" class="form-control" id="dept" required >
				<option value="" >-please select-</option>
				<!--<option value="-1" >ALL Department</option>-->
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
						</td >
						<td style="width:5%;">
						<label>Session:</label>
						</td>
						<td style="width:30%;">
							
                <select name="ses" class="form-control" id="ses" required >
				<option value="" >-please select-</option>
				<option value="-1" >All Sessions</option>
				
				  <?php
			
					$sel = mysqli_query($con,"SELECT * FROM session_tb");	
					if($sel){
					while($row=mysqli_fetch_array($sel)){
						$pid=$row['SesID'];
						$p_name=$row['SesName'];
						?>
						<option  value='<?php echo $row['SesID'];?>'> <?php echo $row['SesName'];?> </option>
						<?php
						}
					
				}
				else
				{echo"cant run query";
				}
			?>
				  </select>
						</td >
						<td style="width:20%;padding-left:20px;">
											
										<input class="btn btn-default hidden-print" name="generate" type="submit" value="GENERATE REPORT"/>	
						</td>
						</form>					
											
							<td style="width:5%;padding-left:150px;">
									<button id="print"  onclick="window.print()" class="btn btn-danger hidden-print">Print</button>
								
							
							
							</td>
						
						</tr>	
						
			</table>
			
	</div>
	
	</div>
	</div>
	</div>
	<hr/>
	<br/>
	<?php
	if(!empty(mysqli_real_escape_string($con,(trim($_POST['generate']))))){
			$dptmt=mysqli_real_escape_string($con,(trim($_POST['dpt'])));
			$ses=mysqli_real_escape_string($con,(trim($_POST['ses'])));
	?>
	<!--</div>
	<div class="wrapper">-->
	<h4 class="hidden-print" style="text-align:center;font-weight:bold;font-family:san-serif;">Department of <?php echo GetProgDetails($dptmt,$con);?> Research Upload Breakdown</h4>
				
	<div class="panel-body" style="background-color:#ffffff;">
	<div class="row" style="margin-left:0px;">
	<div class="col-md-11 col-lg-11" >
				 <table class="table table-bordered table-hover table-stripe col-lg-12 col-xs-12" id="report">
												<thead>
												<tr style="text-align:center;">
													<th>S/no</th>
													<th>Research Topic</th>
													<th>Date Submitted</th>
													
													
													</tr>
												</thead>
												<tbody>
												<?php
                      view_res_dept($dptmt,$ses,$con);
												?>
												</tbody>
											  </table>
									</div>
							</div><!---end of row-->
							</div><!---end of row-->
							
						</div>
		

<?php
	}
//include('../includes/footer.php');

 ?>