<?php
include('../../includes/staff_header.php');
include('../../includes/connect.php');
$email = $_SESSION['login_user_verified'];
$login_staff = getnewstaff($email,$con);
?>
<div class="container" style="background-color:#;height:auto;margin-top:50px;font-family:arial narrow"> 
  <?php echo "<p style='color:blue;font-family:verdana;font-size:14px'>Welcome !".$_SESSION['login_user_verified']."</p>"?>
    <div class="row" style="margin-top:50px;margin-top:10px;">

        <div class="card col-md-6 hidden-print">
        <div class="panel panel-primary">
        <div class="panel-heading ">
     
        </div> <br/>
        <p class="alert alert-info">Create a New Research Entry</p>
		        <form id="staffupload"  method="post" enctype="multipart/form-data">
               <div class="panel-body">
               <label  class="input-group-addon">Topic: <em style="color:red">(Type or paste your Reearch topic)</em></label>
                    <textarea type="text" class="form-control" name="topic" id="topic" required></textarea>

                    <label class="input-group-addon">Reference Text (Type or copy and paste the research reference in APA or MLS style)</label>
                    <textarea type="text" class="form-control" name="rt" id="rt" required></textarea>
					
					         <label  class="input-group-addon">Abstract: <em style="color:red">(Paste a brief description of your project)</em></label>
                    <textarea type="text" class="form-control" name="abstract" id="abstract" required></textarea>
					
                    <label class="input-group-addon">Publication Type:</label>
                    <select name="pt" class="form-control" id="pt" required >
                      <option value="0" >-Please select-</option>
                            <?php
                        
                        $sel = mysqli_query($con,"SELECT * FROM publication_type ");	
                        if($sel){
                        while($row=mysqli_fetch_array($sel)){
                         
                          ?>
                          <option  value='<?php echo $row['id'];?>'> <?php echo $row['pub_type'];?> </option>
                          <?php
                          }
                        
                      }
                      else
                      {echo"cant run query";
                      }
                    ?>
				            </select>
                    <div id="pub_cat" style="display:none">
                      <label class="input-group-addon">Publisher Category:</label>
                        <select name="pc" class="form-control" id="pc"  >
                            <?php
                            
                            $sel = mysqli_query($con,"SELECT * FROM publisher_cat");	
                            if($sel){
                            while($row=mysqli_fetch_array($sel)){
                             
                              ?>
                              <option  value='<?php echo $row['id'];?>'> <?php echo $row['publisher_type'];?> </option>
                              <?php
                              }
                            
                          }
                          else
                          {echo"cant run query";
                          }
                        ?>                  

                        </select>
                    </div>
                    <label  class="input-group-addon">Publishing details:<em style="color:red">(<b>Format:</b> Name of Journal or publisher,ISSN or ISBN,Volume Number,Month-Year)</em></label>
                    <textarea type="text" class="form-control" name="pub_details" id="pub_details" required></textarea>
					
                    <input type="hidden" id="staff" class="form-control" value="<?php echo $login_staff['StaffID'];?>" name="staff" />
               </div>
                <label >Select Your file* <em style="color:red">(only PDFs are allowed)</em></label><br/>
                <input type="file" name="pdffile" class="form-control"  required /><br/>
                    <hr/>
            <div class="panel-footer">
            <button type="submit" class="btn btn-primary " name="submit" > Submit Research <li class="fa fa-save"></li></button>
            </div> 
            <br/>
             </form>
            </div>
        </div>

        <div class="col-md-6" id="message">

      
        </div>
    </div>

</div><br/>
</div><br/>
<br/>
<?php
include('../../includes/footer.php');
?>
