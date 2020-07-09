<?php
sleep(2);
//error_reporting(0);
include('../../includes/connect.php');
include('../../includes/function.php');					
					
								$rowsperpage=5;
			//$_SESSION['search_key']="";
			
			if(!isset($_POST['currentpage']) && isset($_POST['Dept'])){
				//echo "post1";
						$dpt=mysqli_real_escape_string($con,(trim($_POST['Dept'])));	
						$_SESSION['search_dpt']=$dpt;
						//echo $keyword;
						//$r=getAllRecord($con,"submissions","","","");
						$getcurrentpage=1;
			}elseif(isset($_POST['currentpage'])){
						//echo "post2";
						$getcurrentpage=mysqli_real_escape_string($con,(trim($_POST['currentpage'])));
						//echo $getcurrentpage;
						$dpt=$_SESSION['search_dpt'];
						
			}
						
					$fq=getAllRecord($con,"staff_submission","staff_dept='$dpt'","date_uploaded DESC","");
					//var_dump($r);
					$records=mysqli_num_rows($fq);
					
					$offsetarray=setoffset($rowsperpage,$records,$getcurrentpage);
						$offset=$offsetarray[0];
						$totalpages=$offsetarray[1];
					//echo "offset".$offset;
					$r=getAllRecord($con,"staff_submission","staff_dept='$dpt'","date_uploaded DESC","$offset,$rowsperpage");
					
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
								echo "<h6 style='color:blue;text-transform:uppercase;font-family:arial narrow'><a href='#submission{$row['id']}' data-toggle='modal' title='Click to view description' data-target='#submission{$row['id']}'>".$row['topic']."</a></h6>";
								echo "<p style='text-align:justify;font-family:arial narrow;padding:10px;'>".word_teaser($row['abstract'],40)."...</p>";
								echo "<a href='".home_base_url()."research_files/staff_research/{$row['file']}' target='_blank' class='btn btn-success btn-sm'><li class='fa fa-book'></li></a>  <a href='".home_base_url()."main/download.php?link={$row['file']}&source=3' target='_blank' class='btn btn-primary btn-sm'><li class='fa fa-download'></li> </a>  <a href='#profile{$row['user_id']}' data-toggle='modal' data-target='#profile{$row['user_id']}'  class='btn btn-primary btn-sm'><li class='fa fa-eye'></li></a><span style='margin-left:78%;font-family:san-serif;font-size:12px;color:#003300;'>Downloads: {$row['download']}</span>"
						
								?>
								<hr/>
							</div>
					<div id="submission<?php echo $row['user_id'];?>" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-lg">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							
							<h5 class="modal-title"><?php echo $row['topic'];?></h5>
						  </div>
						  <div class="modal-body">
							<p><?php echo $row['abstract'];?></p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					</div>
					<!----------------------------->
					<div id="profile<?php echo $row['user_id'];?>" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-md">
						<?php
						
						$author = get_staff_by_userid($row['user_id'],$con)
						?>
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							
							<h4 class="modal-title">Authors Profile</h4>
						  </div>
						  <div class="modal-body">
							<img src="<?php echo home_base_url();?>staffpassport/<?= $author['Passport'];?>" alt="" class="rounded-circle" style="margin-left:100px"/>
							<table class="table table-bordered">
							<tr><td>Name</td><td><?php echo strtoupper($author['StaffName']);?></td></tr>
							<tr><td>Department</td><td><?php echo GetProgDetails($author['DeptIDs'],$con);?></td></tr>
							<tr><td>Email</td><td><?php echo $author['Email'];?></td></tr>
							<tr><td>Phone</td><td><?php echo $author['Phone'];?></td></tr>
							<tr><td>Rank</td><td><?php echo $author['Rank'];?></td></tr>
							
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
						?>
						
					
						<ul class="pagination" >
							<?php
							echo staffpaginatedpt($getcurrentpage,$totalpages,$_SESSION['search_dpt']);
							?>
							</ul>
						<?php
						else:
						echo "<br/><br/><h5>No records available to display.</h5>";

						endif;
						?>
						
						
				</div>
