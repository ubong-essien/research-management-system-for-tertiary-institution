<?php
include('../includes/staff_header.php');
include('../includes/connect.php');
chksession();
$email = $_SESSION['login_user_verified'];
$login_staff = getnewstaff($email,$con);
$uid = $login_staff['StaffID'];

//use one page to load the various types of research types
$get_q=getAllRecord($con,"staff_submission","user_id='$uid'","publication_type ASC","");
$count_num=mysqli_num_rows($get_q);
?>
<div class="container" style="background-color:#;height:auto;margin-top:50px;font-family:arial narrow"> 
  <?php echo "<p style='color:blue;font-family:verdana;font-size:14px'>Welcome !".$_SESSION['login_user_verified']."</p>"?>
    <div class="row" style="margin-top:50px;padding-top:10px;">
      
    
        <div class="card col-md-12 hidden-print" style="padding:20px 20px 20px 20px;">
        <p class="alert alert-success">All Publication Listing</p>
        <ul >
        <?php
        $x = 1;
        while($st_arr = mysqli_fetch_assoc($get_q)){
          $tkn = $st_arr['research_token'];
                echo "<li class='list-group-item'>({$x}.) "
                .$st_arr['reference_text'].
                " <a title='View Abstract' href='#submission{$tkn}' data-toggle='modal' data-target='#submission{$tkn}' class='btn btn-info'><span class='fa fa-eye'></span></a>
                  <a title='Download full-text' href='../main/download.php?link={$st_arr['file']}&source=3' class='btn btn-primary'><span class='fa fa-download'></span></a>
                 <em style='color:red;font-size:12px;'>".decode_pub_type($st_arr['publication_type'],$con)."</em></li>";
                 echo load_modal($st_arr['topic'],$st_arr['research_token'],$st_arr['abstract'],$st_arr['pub_details'],$st_arr['download']);
        $x++;
        }
        ?>
       
        </ul>
        <p class="alert alert-info">Number of Entries : <?= $count_num;?></p><br/>
        </div>

       
    </div>

</div><br/>
</div><br/>
<br/>
<?php
include('../includes/footer.php');
?>
