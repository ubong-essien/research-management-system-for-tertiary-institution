<?php
sleep(2);
include('../../includes/connect.php');
include('../../includes/function.php');					
$Yr="";				
								$rowsperpage=5;
			//$_SESSION['search_key']="";
			
			if(!isset($_POST['currentpage']) && isset($_POST['Yr'])){
				//echo "post1";
						$Yr=mysqli_real_escape_string($con,(trim($_POST['Yr'])));	
						$_SESSION['search_yr']=$Yr;
						//echo $keyword;
						//$r=getAllRecord($con,"submissions","","","");
						$getcurrentpage=1;
			}elseif(isset($_POST['currentpage'])){
						//echo "post2";
						$getcurrentpage=mysqli_real_escape_string($con,(trim($_POST['currentpage'])));
						//echo $getcurrentpage;
						$Yr=$_SESSION['search_yr'];
						
			}
						
					$fq=getAllRecord($con,"staff_submission","pub_year='$Yr'","date_uploaded DESC","");
					//var_dump($r);
					$records=mysqli_num_rows($fq);
					
					$offsetarray=setoffset($rowsperpage,$records,$getcurrentpage);
						$offset=$offsetarray[0];
						$totalpages=$offsetarray[1];
					//echo "offset".$offset;
					$r=getAllRecord($con,"staff_submission","pub_year='$Yr'","date_uploaded DESC","$offset,$rowsperpage");
					
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
								echo "<h6 style='color:blue;text-transform:uppercase;font-family:arial narrow'><a href='#submission{$row['id']}' title='Click to view decription' data-toggle='modal' data-target='#submission{$row['id']}'>".$row['topic']."</a></h6>";
								echo "<p style='text-align:justify;font-family:arial narrow'>".word_teaser($row['abstract'],56)."...</p>";
								echo "<a href='".home_base_url()."research_files/staff_research/{$row['file']}' target='_blank' class='btn btn-success btn-sm'><li class='fa fa-book'></li></a>  <a href='".home_base_url()."main/download.php?link={$row['file']}&source=3' target='_blank' class='btn btn-primary btn-sm'><li class='fa fa-download'></li> </a>  <a href='#profile{$row['user_id']}' data-toggle='modal' data-target='#profile{$row['user_id']}'  class='btn btn-primary btn-sm'><li class='fa fa-eye'></li></a><span style='margin-left:78%;font-family:san-serif;font-size:12px;color:#003300;'>Downloads: {$row['download']}</span>"
						
							?>
								<hr/>
							</div>
							<div id="submission<?php echo $row['id'];?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">

									<!-- Modal content-->
									<div class="modal-content">
									<div class="modal-header">
										
										<h4 class="modal-title"><?php echo $row['topic'];?></h4>
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
					<div id="profile<?php echo $row['id'];?>" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-md">
						<?php
						echo $_SESSION['search_yr'];
						$authorsres=get_all_pub_for_yr($_SESSION['search_yr'],$con);
						$author = $authorsres[0];
						$author_count = $authorsres[1];
						//var_dump($author);
						$auth = get_staff_by_userid($author['user_id'],$con);
					
						?>
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							
							<h4 class="modal-title">Authors Profile</h4>
						  </div>
						  <div class="modal-body">
							<img src="<?php echo home_base_url();?>staffpassport/<?php echo $auth['Passport'];?>" alt="" style="margin-left:100px"/>
							<table class="table table-bordered">
							<tr><td>Name</td><td><?php echo $auth['StaffName'];?></td></tr>
							<tr><td>Staff Number</td><td><?php echo $auth['StaffSchID'];?></td></tr>
							<tr><td>Department</td><td><?php echo GetProgDetails($auth['DeptIDs'],$con);?></td></tr>
							<tr><td>Email</td><td><?php echo $auth['Email'];?></td></tr>
							<tr><td>Phone</td><td><?php echo $auth['Phone'];?></td></tr>
						
							
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
							echo paginateyear($getcurrentpage,$totalpages,$_SESSION['search_yr']);
							?>
							</ul>
						<?php
						else:
						echo "<br/><br/><h5>No records available to display.</h5>";

						endif;
						?>
						
						
				</div>
