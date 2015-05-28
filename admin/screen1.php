<?php 
include "config/koneksi.php";
// include "config/class.php";
// $grafik = new Backend();   

// $showdat2 = $grafik->index_visitor();
?>
<script type="text/javascript">
$(function () {
        $('#container1').highcharts({
                    title: {
                text: 'Site A Visitors',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {	
				categories: [<?php $arsip = mysql_query ("SELECT DATE_FORMAT(tanggal, '%M') As Bulan from counter where sub_location ='' and location !='' group  by Month (tanggal) asc ");  while($r=mysql_fetch_array($arsip)){?> '<?php echo $r['Bulan'];?>',<?php } ?>]
            },
            yAxis: {
                title: {
                    text: 'Total'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Visitor',
                data: [<?php foreach ( $showdat2 as $data){ ?><?php echo $data['total'];?>,<?php } ?> ]
            }]
        });
    });
    

		</script>
		 <table style="width: 310px; height: 300px; float:right;" cellpadding='0' cellspacing='0' border='0'>
							 <thead>
							  <tr>
							  <th>Month</th>
							  <th>Visitor</th>
							  </tr>
							  </thead><tbody>
							  <tr>
							
							 </tr>
							 <tr><?php foreach ( $showdat2 as $data){ ?>
							
								<td><center><?php echo $data['Bulan'];?></center></td>
								<td><center><?php echo $data['total'];?></center></td>
							</tr>
							<?php }?>
							 </tbody>
							  </table>
	<div id="container1" style="width: 610px; height: 300px; float: right auto"></div>

	