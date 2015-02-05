<?php
function total($kd_keluhan,$flag){
	if($flag=='all'){
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan'");
	}else{
		$sql = mysql_query("select count(*) as total from tbl_keluhan_pasien where kd_keluhan='$kd_keluhan' and status_pasien='$flag'");
	}
	//$file = $this->db->query('select file from tbl_resume_keluhan where kd_keluhan = '$kd_keluhan' );
	$row = mysql_fetch_array($sql);
	return $row['total'];
}
?> 
<div class="row">
        <!--div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Tanggal Kejadian KLB Keracunan Pangan</h3>
            </div>
            <!-- /widget-header >
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>
            <!-- /widget-content > 
          </div>
        </div-->
        <!-- /span6 -->
        <div class="span12">
           <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Resume Laporan KLB Keracunan Pangan</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding:30px">
								<table id="example1" class="table table-bordered table-striped">
				                	<thead>
				                        <tr> 
				                        	<th>No</th>
				                        	<th>Kabupaten</th>
                                  <th>Kecamatan</th>
                                  <th>Kelurahan</th>
				                        	<th>Nama Kejadian</th>
				                        	<th>Tanggal</th>
                                  <th>Jumlah Korban</th>
                                  <th>Sehat</th>
                                  <th>Sakit</th>
                                  <th>Meninggal</th>
                                  <th>Hasil Analisa</th>
				                        </tr>
				                    </thead>
				                    <tbody>
										<?php $no = 1; foreach($keluhan as $row){?>
				                        <tr>
				                        	<td><?php echo $no;?></td>
				                        	<!--td><a href="<?php echo base_url();?>form/form01/result/<?php echo $row->kd_keluhan;?>"><?php echo $row->kd_keluhan;?></a></td-->
                                  <td></td>
                                  <td></td>
                                  <td></td>
				                        	<td><?php echo $row->nama_kejadian;?></td>
											
				                        	<td><?php echo $row->waktu_lapor;?></td>
				                  <td><?php echo total($row->kd_keluhan,'all');?></td>
				                  <td><?php echo total($row->kd_keluhan,'0');?></td>
				                  <td><?php echo total($row->kd_keluhan,'1');?></td>
                                  <td><?php echo total($row->kd_keluhan,'2');?></td>
                                  <td><a href="<?php echo base_url();?>form/form01/result/<?php echo $row->kd_keluhan;?>">Lihat</a></td>
				                        </tr>
										<?php $no++; } ?>
				                    </tbody>
				               	</table>
					
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
      </div>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/full-calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/base.js"></script>
      <script>     

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
    </script><!-- /Calendar -->