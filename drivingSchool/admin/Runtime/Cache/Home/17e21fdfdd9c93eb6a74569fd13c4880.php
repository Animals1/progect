<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
   <script type="text/javascript" src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
   <script>
	 $(function () { 
	    $('#container').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: '2016 油气表'
	        },
	        xAxis: {
	            categories: [<?php echo $month;?>]
	        },
	        yAxis: {
	            title: {
	                text: '升数'
	            }
	        },
	        series: [
			<?php foreach($data as $k=>$v){ ?>
			
			{
	            name: '<?php echo $v;?>',
	            data: [10, 62, 44,62]
	        }
			<?php  if($k+1=='3'){ echo ""; } else { echo ","; } ?>
			<?php	} ?>
			]
	    });
	});
   </script>
</head>
	
<body>
   <div id="container" style="min-width:800px;height:400px;"></div>
</body>
</html>