
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo site_url(); ?>">Kesiswaan</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"><?php echo $title; ?></a>
					</li>
				</ul>
			
			</div>
			
	
			
			
			


 <script type="text/javascript">
      
$(function () {
    // Set up the chart
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container_grafik',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: 'Grafik Batang <?php echo $statistik; ?>'
        },

       xAxis: {
            categories: ['<?php echo $categorie_xAxis; ?>']
           
           
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b> {point.y:.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
         series: [
         
         <?php 
         $htmls ="";
         foreach ($grid as $key){
         $varnya = $key['INDEXES'];
         $jumlah = $key['Jumlah'];
         

           $htmls .=",{
            name: '$varnya',
            data: [$jumlah]
            }";

       
         
         }

         echo substr($htmls,1);
        ?>

        ]
    });


  var chart = new Highcharts.Chart({
        chart: {
			renderTo: 'container_Pie',
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
		
        title: {
            text: '<?php echo $statistik; ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: '<?php echo $statistik; ?>',
            data: [
               <?php echo $json_pie_chart; ?>
               
                
                
                
            ]
        }]
    });











        });
    </script>
	
<div class="row">
  <div class="col-md-12">
  
<div class="portlet box red">
	<div class="portlet-title">
		<div class="caption">
		<i class="	 icon-bar-chart  font-white-sharp"></i>
			 <?php echo $title; ?>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse">
			</a>
			
			<a href="javascript:;" class="remove">
			</a>
			
			
		</div>
		<div class="actions">
			
			<a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;" data-original-title="" title="">
			</a>
			
		</div>
	</div>
    <div class="portlet-body" id="headerawal">
    	<div class="tabbable-custom nav-justified">
    		<ul class="nav nav-tabs nav-justified">
    			<li class="active">
    				<a href="#tab_1_1_1" data-toggle="tab">
    				Statistik Grafik </a>
    			</li>
    			<li>
    				<a href="#tab_1_1_2" data-toggle="tab">
    				Statistik Tabel </a>
    			</li>
    		</ul>
    		<div class="tab-content">
    			<div class="tab-pane active" id="tab_1_1_1">
                    <br>
    				<div id="container_grafik"  class="grafikdiv"></div>
    				<div id="container_Pie"   class="grafikdiv"></div>
    	        </div>
    			<div class="tab-pane" id="tab_1_1_2">
    			    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="3%"> No </th>
                                    <th>   <?php echo $header; ?></th>
                                    <th> Jumlah </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if(empty($grid)){?>
                                    <tr>
                                        <td colspan="4"><center>No Record(s)</center> </td>
                                    </tr>
                                <?php }else{
                            ?>
                            <?php if ($grid): ?>
                                <?php $i=1; 
                                $total=0;
                                foreach ($grid as $val): ?>
                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $val['INDEXES']; ?> </td>
                                        <td> <?php echo $val['Jumlah']; ?> </td>
                                    </tr>
                                <?php $i++; $total = $total+$val['Jumlah']; endforeach; ?>
                            <?php endif; ?>
                                <tr>
                                    <td colspan="2" align="right"> Subtotal </td>
                                    <td> <?php echo $total ?> </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>    				
    			</div>    			
    		</div>
    	</div>
    </div>
</div>
</div>
</div>
			
<script>
  
     function changeden(){
        var chartsel = $("#grafik_chart").val();

        var style = "display:block";
        $("#container_grafik").attr("style","display:none;");
        $("#container_Pie").attr("style","display:none;");
        $("#container_line").attr("style","display:none;");
        switch(chartsel){
            case "1" : 
                    $("#container_grafik").attr("style",style);
                break;
            case "3" :
                    $("#container_Pie").attr("style",style);
                break;
            case "2" : 
                    $("#container_line").attr("style",style);
                break;
        }
    }
</script>
<script src="<?php echo base_url(); ?>__statics/js/grafik/grafiksatu.js"></script>
<script src="<?php echo base_url(); ?>__statics/js/grafik/3d.js"></script>
<script src="<?php echo base_url(); ?>__statics/js/grafik/download.js"></script>



	  

