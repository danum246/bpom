<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script>
$(function() {
  $( "#from" ).datepicker({
    changeMonth: true,
    numberOfMonths: 1,
    onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
    }
  });
  $( "#to" ).datepicker({
    changeMonth: true,
    numberOfMonths: 1,
    onClose: function( selectedDate ) {
      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
    }
  });
});
</script>

<div class="row">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <i class="icon-star"></i>
        <h3>Date Range</h3>
      </div> <!-- /widget-header -->
      <div class="widget-content">
        <b><center>LAPORAN</center></b><br>
        <form id="edit-profile" class="form-horizontal" method="post" action="#">
          <fieldset>
            <div class="control-group pull-right" style="margin-right:270px;">                     
              <label class="control-label">TO</label>
              <div class="controls">
                <input type="text" class="span3" id="to" placeholder="TO" value="">
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            <div class="control-group">                     
              <label class="control-label">FROM</label>
              <div class="controls">
                <input type="text" class="span3" id="from" placeholder="FROM" value="">
              </div> <!-- /controls -->       
            </div> <!-- /control-group -->
            <div class="form-actions" style="margin-bottom: -30px;">
              <input type="submit" class="btn btn-primary" value="Process"/> 
              <input type="reset" class="btn btn-warning" value="Reset"/>
            </div> <!-- /form-actions -->
          </fieldset>
        </form>
      </div> <!-- /widget-content -->        
    </div> <!-- /widget -->
  </div>
</div>

<div class="row">
          
          <div class="span12">
        
          <div class="info-box">
               <div class="row-fluid stats-box">
                  <div class="span4">
                    <div class="stats-box-title">Total Laporan</div>
                    <div class="stats-box-all-info"><i class="icon-inbox " style="color:#3366cc;"></i> <?php echo $total;?></div>
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Keracunan</div>
                    <div class="stats-box-all-info"><i class="icon-flag"  style="color:#F30"></i> <?php echo $keracunan;?></div>
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Non</div>
                    <div class="stats-box-all-info"><i class="icon-check" style="color:#3C3"></i> <?php echo $non;?></div>
                   
                  </div>
               </div>
               
               
             </div>
               
               
         </div>
         </div>      
          
        <!-- /row -->
  
 <!-- /row -->

<script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/chart.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/full-calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/base.js"></script>

<script>

    var pieData = [
        {
            value: 30,
            color: "#F38630"
        },
        {
            value: 50,
            color: "#E0E4CC"
        },
        {
            value: 100,
            color: "#69D2E7"
        }

      ];

    var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
        {
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
      ]

    }

    var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
  var myLine = new Chart(document.getElementById("bar-chart1").getContext("2d")).Bar(barChartData);
  var myLine = new Chart(document.getElementById("bar-chart2").getContext("2d")).Bar(barChartData);
  var myLine = new Chart(document.getElementById("bar-chart3").getContext("2d")).Bar(barChartData);
  
  </script>