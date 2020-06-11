<?php
sleep(2);
//error_reporting(0);
include('../includes/connect.php');
include('../includes/function.php');

	$rowsperpage=5;
			//$_SESSION['search_key']="";
			
			if(!isset($_POST['currentpage']) && isset($_POST['Yr'])){
				//echo "post1";
						$yr=mysqli_real_escape_string($con,(trim($_POST['Yr'])));	
						$_SESSION['search_year']=$yr;
						//echo $keyword;
						//$r=getAllRecord($con,"submissions","","","");
						$getcurrentpage=1;
			}elseif(isset($_POST['currentpage'])){
						//echo "post2";
						$getcurrentpage=mysqli_real_escape_string($con,(trim($_POST['currentpage'])));
						//echo $getcurrentpage;
						$yr=$_SESSION['search_year'];
						
			}
						
					$fq=getAllRecord($con,"submissions","Ses='$yr'","Date_Submitted DESC","");
					//var_dump($r);
					$records=mysqli_num_rows($fq);
					
					$offsetarray=setoffset($rowsperpage,$records,$getcurrentpage);
						$offset=$offsetarray[0];
						$totalpages=$offsetarray[1];
					//echo "offset".$offset;
					$r=getAllRecord($con,"submissions","Ses='$yr'","Date_Submitted DESC","$offset,$rowsperpage");
					
					echo "<h6 style='padding:5px'>Number of records: ".$records."</h6>";
?>
<br/><br/>
<div class="row">
			<?php
								if($records!=0):
								while($row=mysqli_fetch_assoc($r)):
								?>
				<div class="col-md-12 col-lg-12">
					
						
								<?php
								echo "<h6 style='color:blue;text-transform:uppercase;font-family:times new romans'><a href='#submission{$row['id']}' title='Click to view decription' data-toggle='modal' data-target='#submission{$row['id']}'>".$row['Submission_Title']."</a></h6>";
								echo "<p style='text-align:justify;font-family:san-serif'>".word_teaser($row['descr'],56)."...</p>";
								echo "<a href='../research_files/{$row['File']}' target='_blank' class='btn btn-success btn-sm'><li class='fa fa-book'></li> </a>  <a href='download.php?link={$row['File']}' target='_blank' class='btn btn-primary btn-sm'><li class='fa fa-download'></li> </a>  <a href='#profile{$row['id']}' data-toggle='modal' data-target='#profile{$row['id']}'  class='btn btn-primary btn-sm'><li class='fa fa-eye'></li></a><span style='margin-left:78%;font-family:san-serif;font-size:12px;color:#003300;'>Downloads: {$row['downloads']}</span>"
						
								?>
								<hr/>
							</div>
					<div id="submission<?php echo $row['id'];?>" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-lg">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							
							<h4 class="modal-title"><?php echo $row['Submission_Title'];?></h4>
						  </div>
						  <div class="modal-body">
							<p><?php echo $row['descr'];?></p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					</div>
					<!------------------------------------------>
					<div id="profile<?php echo $row['id'];?>" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-md">
						<?php
						$author=getdatabyreg($row['RegNo'],$con)
						
						?>
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							
							<h4 class="modal-title">Authors Profile</h4>
						  </div>
						  <div class="modal-body">
							<img src="<?php echo home_base_url();?>img/ph.jpg" alt="" style="margin-left:100px"/>
							<table class="table table-bordered">
							<tr><td>Name</td><td><?php echo $author['SurName'].", ".$author['FirstName']." ".$author['OtherNames'];?></td></tr>
							<tr><td>Reg Number</td><td><?php echo $row['RegNo'];?></td></tr>
							<tr><td>Department</td><td><?php echo GetProgDetails($row['DeptID'],$con);?></td></tr>
							<tr><td>Email</td><td><?php echo $author['Email'];?></td></tr>
							<tr><td>Phone</td><td><?php echo $author['Phone'];?></td></tr>
							<tr><td>Supervisor</td><td><?php echo getsupervisor($row['SupervisorId'],$con);?></td></tr>
							
							</table>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					</div>
						<?php
						
						endwhile;
						else:
						echo "<h5>No records available to display.</h5><br/>";
						endif;
						?>
					<ul class="pagination">
							<?php
							echo paginateyear($getcurrentpage,$totalpages,$_SESSION['search_year']);
							?>
					</ul>
					
				</div>
