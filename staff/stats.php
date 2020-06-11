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

 $(document).ready(function(){
    $('#report').DataTable({
        
		"order": [[ 0, "asc" ]]
    });


}); 
</script>

<div class="container" style="margin-top:70px;">
	
				<h4 style="text-align:center;font-weight:bold;font-family:san-serif;">Research Upload Breakdown</h4>
				        
				<div class="row">
				<div class="col-md-12 col-lg-12">
				<div class="panel panel-primary">
				<div class="panel-heading hidden-print">
				
				<table width="100%">
				
						<tr>
						<form action="stats.php" method="post">
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
	<br/>
	<br/>
	<?php
	if(!empty(mysqli_real_escape_string($con,(trim($_POST['generate']))))){

	?>
	<!--</div>
	<div class="wrapper">-->
	<div class="panel-body" style="background-color:#ffffff;">
	<div class="row" style="margin-left:0px;">
	<div class="col-md-11 col-lg-11" >
				 <table class="table table-bordered table-hover table-stripe col-lg-12 col-xs-12" id="report">
												<thead>
												<tr>
													<th>S/no</th>
													<th>Department</th>
													<th>Number Of Research works</th>
													
													
													</tr>
												</thead>
												<tbody>
												<?php
                      calc_res_dept($con);
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