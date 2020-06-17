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
       //alert(userdata);
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
               // alert(ful_url);
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
 }); 
  