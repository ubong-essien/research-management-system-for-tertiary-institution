<?php
include('../includes/header.php');
include('../includes/connect.php');
//$d=getdatabyreg($_SESSION['login_user_verified'],$con)
?>
<div class="container" style="background-color:#;height:auto;margin-top:50px;">
    <div class="row" style="margin-top:50px;margin-top:10px;">

        <div class=" card col-md-4 hidden-print"><br/>
            <div class="panel panel-primary">
                <div class="alert alert-info ">
                  Supply Your registration Number
                </div> <hr/>
                 <form id="regverify" method="post" >
                    <div class="panel-body">
                
                            <label class="input-group-addon">Registration Number</label>
                            <input type="text" class="form-control" id="regno" name="regno" /><br>
                            <input type="hidden" class="form-control" id="status" name="status" value="1" /><br>
                         <div class="panel-footer">
                         <input type="submit" class="btn btn-primary " name="verify" />
                         </div> 
                      <br/>
                    </div>
                 </form>
                 <br/>
                 <div id="response_stage"></div>
            </div>
        </div>
<div class="col-md-8">

</div>
	
		
		
    </div>

</div><br/>
</div><br/>
<br/>
<?php
include('../includes/footer.php');
?>
