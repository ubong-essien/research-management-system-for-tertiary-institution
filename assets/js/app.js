/* $(document).ready(function(){
 
  var data=[{"label":"Agricultural Economics and Extension","value":0},
  {"label":"Animal Science","value":0},
  {"label":"Crop Science","value":0},
  {"label":"Soil Science","value":0},
  {"label":"English ","value":0},
  {"label":"History and International Studies","value":0},
  {"label":"Religious and Cultural Studies","value":0},
  {"label":"Mass Communication","value":0}]
 

}); */
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
                $('#response_stage').append("<p style='color:green'>Login Details Created Successfully,Please click Login to login with Your registration Number and accesscode</p>"),2000
              );
            }
            else if(response == "***")
            {
              setTimeout(
                $('#response_stage').append("<p style='color:red'>Error Creating Account...!</p>"),2000
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
                      $('#response_stage').append("<p style='color:red'>Account already exist..please click Login to login with you credentials !!</p>");
                    break;
                    case "###":
                      $('#response_stage').append("<p style='color:green'>Registration Number verification complete...</p>");
                      setTimeout(
                        $('#response_stage').append("<p style='color:red'>Preparing to create Login details...</p>"),40000
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

     formData.append('pt',pt); 
     formData.append('topic',topic); 
     formData.append('abstract',abstract); 
     formData.append('rt',rt); 
     formData.append('pc',pc); 
     formData.append('pub_details',pub_details); 
     formData.append('staff',staff); 
     
   // var rec_data =$('#staffupload').serialize();
    
    alert(formData);
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
      $('#message').html(html);
      alert('Data Saved Successfully!!');
      location.reload().delay(2000);
     /*  $('staffupload').fadeOut(800,function(){
        $('staffupload').html(html).fadeIn().delay(2000);
      }); */
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

  