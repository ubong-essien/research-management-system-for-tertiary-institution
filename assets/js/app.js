
///////staff js scri[ts]
/********************staff 
          * javascript 
          * script
 *************This js file cordinates the staff module mostly************ */
function message_alert(color,message){

	var html = "<div id='alerting' class='w3-animate-zoom' style='display:block;width:20%;height:5%;background-color:" + color + ";border-radius:5px;margin-left:40%;position:absolute;z-index:1;top:2;text-align:center;padding-top:10px;opacity:0.7;color:#fff' >" + message + "</div>";
	
	return html;
	}

//$(window).load(function(){
  function showloader(){
    $('#progbar').show();
    return;
   }
   
   function hideloader(){
    
    $('#progbar').hide();
    return;
   } 
   $(document).ready(function(){
$('#staffsearch').submit(function(e){
 // alert("ahhk");
  $('#progbar').show();
  var srch = $('#srch').val();
  if(!(srch=="")){
    
 //alert("yeeeea")8
e.preventDefault();
 var regdata=$(this).serialize();
 
 //alert(regdata);
  $.ajax({ 
     type:'POST',
     url:'../../handlers/staff_explore_handlers/staffkeyword_handler.php',
     data:regdata,
     success:function(data){
       $('#progbar').hide();
  
       $('#staffstage').html(data);
       
               }
     
       });  
     }else{
       $('#progbar').hide();
       $('#emtpymsg').html("<p style='color:red'>Please specify a search criteria</p>");
       return false;
     }
 });
})
 



/*****************dept select ajax call******************* */
staff_dept_send = function(id){
//alert(id);
$('#progbar').show();

var dptid=id;
$.ajax({ 
         type:'POST',
         url:'../../handlers/staff_explore_handlers/staffgetdept.php',
         data:{Dept:dptid},
         success:function(html){
       //alert(html);
       // $('#stage').hide();
       $('#progbar').hide();
      $('#staffstage').html(html);
       
               }
     
   }); 
return;
}

/***************pagination onclick event function for depat search***************************/
function staffpaginatedpt(page){
  //alert('giufioghu');
  $('#progbar').show();
  var p=page;
  
  $.ajax({ 
       type:'POST',
       url:'../../handlers/staff_explore_handlers/staffgetdept.php',
       data:{currentpage:page},
       success:function(html){
         //alert(html);
         // $('#stage').hide();
         $('#progbar').hide();
        $('#staffstage').html(html);
         
                 }
       
     });  
  
  return;
  
  }

/**************this gets all work for a staff*****************/
staffsendsupervisor = function(id){
  //alert(id);
$('#progbar').show();

var sup=id;

$.ajax({ 
     type:'POST',
         url:'../../handlers/staff_explore_handlers/getsupervisor.php',
     data:{sup_id:sup},
         success:function(html){
       //alert(html);
       // $('#stage').hide();
     $('#progbar').hide();
     $('#staffstage').html(html);
       
               }
     
   }); 


return;
}
/*******************************/
/***************this is a function in the onclikc event of a pagination**************************/
function staffgetsup(page){
  //alert(page);
 // return;
  $('#progbar').show();
  var page = page;

  $.ajax({ 
             type:'POST',
             url:'../../handlers/staff_explore_handlers/getsupervisor.php',
             data:{currentpage:page},
            success:function(html){
         //alert(html);
         // $('#stage').hide();
            $('#progbar').hide();
            $('#staffstage').html(html);
                 }
     });  
  
 // return;
  
  }

/**************key word pagination link onclick event function*************** */
function paginate(page){
$('#progbar').show();
var p=page;

$.ajax({ 
     type:'POST',
     url:'../../handlers/staff_explore_handlers/staffkeyword_handler.php',
     data:{currentpage:page},
     success:function(html){
       //alert(html);
       // $('#stage').hide();
       $('#progbar').hide();
      $('#staffstage').html(html);
       
               }
     
   });  

return;

}


/***************oonclick function in year in staff section if the explore*******************/
staffsendyr = function(id){
$('#progbar').show();
//alert(id);

var yrid=id;
$.ajax({ 
     type:'POST',
     url:'../../handlers/staff_explore_handlers/staffgetyear.php',
     data:{Yr:yrid},
     success:function(html){
       //alert(html);
       // $('#stage').hide();
       $('#progbar').hide();
      $('#staffstage').html(html);
       
               }
   }); 
return;
}
/*****************in the pagination link for ajax rsponse of year************************/
function paginateyr(page){
$('#progbar').show();
var p=page;
//alert(p);
/* var f=<?php echo $_SESSION['search_key'];?>
alert(f); */
//$('#srch').val();


$.ajax({ 
     type:'POST',
     url:'../../handlers/staff_explore_handlers/staffgetyear.php',
     data:{currentpage:page},
     success:function(html){
       //alert(html);
       // $('#stage').hide();
       $('#progbar').hide();
      $('#staffstage').html(html);
       
               }
     
   });  

return;

}

//}); 




 /***************end of staff scripts******************** */
function addloader(){

	$('.loader').removeClass('fa-upload');
	$('.loader').addClass('fa-cog fa-spin');
	}
	function removeloader(){
	$('.loader').removeClass('fa-cog fa-spin');
	$('.loader').addClass('fa-upload');

	}


function rootname(){
  var HOST = $(location).attr('hostname');
  var protocol = $(location).attr('protocol');
  var page = $(location).attr('pathname');
  var d = page.split('/');
  var root = protocol + "//" + HOST + "/" + d[1] + "/";
  
  return root;
}

 /* $(function(){
   
    $.ajax({
      url: 'chartdata.php',
      type: 'POST',
      success : function(data) {
       
        chartData = data;
        //alert(chartData);
        var chartProperties = {
          "caption": "Payment Chart by Department",
          "xAxisName": "Department",
          "yAxisName": "Count",
          "rotatevalues": "1",
          "theme": "zune"
        };
        apiChart = new FusionCharts({
          type: 'column2d',
          renderAt: 'chart-container',
          width: '1100',
          height: '350',
          dataFormat: 'json',
          dataSource: {
            "chart": chartProperties,
            "data": chartData
          }
        });
        apiChart.render();
      }
    });
  });  */
  /////////////////////////////////////////

  $(document).ready(function(){
	
    $('#signupform').submit(function(e){
      $('#loadingimg').css('display:block;');
     // alert("yeeeea")
      e.preventDefault();
     var userdata =$(this).serialize();
      // alert(userdata);
      //return;
     // var url = '<?php echo home_base_url();?>';
              
           switch(userdata){
              case "user_type=U":
                var ful_url = "undergraduate/signup.php";
               // alert(ful_url);
                $(location).attr('href',ful_url);
              
              break;
              case "user_type=P":
                var ful_url = "pg/signup.php";
               // alert(ful_url);
                $(location).attr('href',ful_url);
                
              break;
              case "user_type=S":
                var ful_url = "staff/signup.php";
                alert(ful_url);
                $(location).attr('href',ful_url);
               
              break;
                default:

              break;
           }
     });
  });



  
$(document).ready(function(){
	$('#loginform').submit(function(e){
		 $('#submit').removeClass('fa-sign-in');
		 $('#submit').addClass('fa-cog fa-spin');
		//alert("yeeeea");
		 e.preventDefault();
		var regdata=$(this).serialize();
  
		 // alert(regdata);
		     $.ajax({ 
                type:'POST',
			        	url:rootname() +'handlers/login_handler.php',
                data:regdata,
			        	success:function(html){
					$('#submit').removeClass('fa-cog fa-spin');
					//$('#submit').addClass('fa-sign-in');
					
					$('#regstage').html(html);
					
				
											
									}
				
            });  
    });
    

 /********************function to process the signup************************* */
 function create_login(reg_no){
	//alert(reg_no);
	$.ajax({ 
					type:'POST',
					url:rootname() + 'handlers/undergrad_signup_handler.php',
					data:{'regno': reg_no,'status' : 2},
          success:function(response)
          {
            if(response == "AA")
            {
              setTimeout(
                $('#response_stage').html("<p style='color:green'>Login Details Created Successfully,Please click Login to login with Your registration Number and accesscode</p>"),2000
              );
            }
            else if(response == "***")
            {
              setTimeout(
                $('#response_stage').html("<p style='color:red'>Error Creating Account...!</p>"),2000
              );
            }
					
						
					}
				});
}
 /********************function to process the signup************************* */ 
 $('#regverify').submit(function(e){
        /*  $('#submit').removeClass('fa-sign-in');
          $('#submit').addClass('fa-cog fa-spin'); */
        //alert("yeeeea");
         e.preventDefault();
        var regdata=$(this).serialize();
        var reg_num = $('#regno').val();
        // alert(regdata);

//alert(d[1]);
//return;
      $.ajax({ 
             type:'POST',
             url:rootname() + 'handlers/undergrad_signup_handler.php',
             data:regdata,
             success:function(text){
             /*  $('#submit').removeClass('fa-cog fa-spin');
             $('#submit').addClass('fa-sign-in'); */
             console.log(text);

              switch(text){
                    case "XXX":
                      $('#response_stage').html("<p style='color:red'>Account already exist..please click Login to login with you credentials !!</p>");
                    break;
                    case "###":
                      $('#response_stage').html("<p style='color:green'>Registration Number verification complete...</p>");
                      setTimeout(
                        $('#response_stage').html("<p style='color:red'>Preparing to create Login details...</p>"),40000
                      );
                      setTimeout(create_login(reg_num),2000);
                    break;

              }
            //  $('#regstage').html(html);
          
               }
     
         });  
 });

/***************************************************** */

$("#staffupload").submit(function(e){
		
  //alert("jhfds");
  addloader();
  //return;
  e.preventDefault(e);
     var formData = new FormData($(this)[0]);
     var pt = $('#pt').val();
     var abstract = $('#abstract').val();
     var rt = $('#rt').val();
     var pc = $('#pc').val();
     var pub_details =  $('#pub_details').val();
     var staff =  $('#staff').val();
     var topic =  $('#topic').val();
     var py =  $('#py').val();

     formData.append('pt',pt); 
     formData.append('topic',topic); 
     formData.append('abstract',abstract); 
     formData.append('rt',rt); 
     formData.append('pc',pc); 
     formData.append('pub_details',pub_details); 
     formData.append('staff',staff); 
     formData.append('py',py); 
     
   // var rec_data =$('#staffupload').serialize();
    
    //alert(formData);
    //return;
    //formData.append('form_data',rec_data);
   // alert(formData);
    //formData.append('img_name',img_name);
    //console.log(formData.values());
    //return;
      $.ajax({
      type: "POST",
      url: rootname() + 'handlers/staff_upload_handler.php', // Url to which the request is send
      data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type "used when sending data to the server.
      cache: false,             // To unable request pages to be cached
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(html)   // A function to be called if request succeeds
      {
        console.log(html);
        removeloader();
        $('#message-alert').focus();
        $('#message-alert').html(message_alert('green',"Record Saved Successfully !"));
					setTimeout(() => {$('#alerting').hide()
						
          }, 2000);
          
    
      //location.reload().delay(2000);
     /*  $('staffupload').fadeOut(800,function(){
        $('staffupload').html(html).fadeIn().delay(2000);
      }); */
      }
    });  

  });
/********************function to edit profile************************* */ 
  $('#form_edit_profile').submit(function(e){
    e.preventDefault(e);
  //alert("uwa");
  //return;
    $('#edit_submit').removeClass('fa-save');
    $('#edit_submit').addClass('fa-cog fa-spin');
  //alert("yeeeea");
  
  var regdata=$(this).serialize();
  //alert(regdata);
  $.ajax({ 
        type:'POST',
        url:rootname() + 'handlers/staff_edit_handler.php',
        data:regdata,
        success:function(html){
        $('#edit_submit').removeClass('fa-cog fa-spin');
        $('#edit_submit').addClass('fa-save');
        console.log(html);

                $('#edit_response_stage').html(html);
               // alert('Data updated Successfully!!');
               // delay(5000,Location.reload());
                //  alert('Data updated Successfully!!');
             window.setTimeout(function(){location.reload(true)},3000);
      //  $('#regstage').html(html);
    
          }

    });  
  });
  
  
 }); 

 $("#pt").change(function(e){
 
  var pub_type = $('#pt').val();
  console.log(pub_type);
    //var pub_type =$('#pt').val();
  if((pub_type == 1)){
    $('#pub_cat').show();
   }else{
    $('#pub_cat').hide();
   }
  
  });
