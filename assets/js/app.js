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


 $(function(){
   
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
  }); 
  /////////////////////////////////////////
  