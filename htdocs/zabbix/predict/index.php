<?php
	$row = 1;
	$ch = "";
	if (($handle = fopen("result.csv", "r")) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
		{
			$num = count($data);
			//echo "<p> $num fields in line $row: <br /></p>\n";
			$row++;
			$label = $data[0];
			$y = $data[1];
			$ch = $ch . "{ label: '$label',  y: $y  },";
		}
		fclose($handle);
	}
?>
<!doctype html>
<html>
	<head>
		<title>Result of prediction</title>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <?php
			echo "
			<script type='text/javascript'>
				window.onload =
				(
					function ()
					{
						var chart = new CanvasJS.Chart
						(
							'chartContainer',
							{
								title:
								{
									text: 'The result of prediction next day'              
								},
								data:
								[
									{
										type: 'column',
										dataPoints:
										[
											$ch
										]
									}
								]
							}
						); chart.render();
					}
				);
			</script>
		"
		?>
	</head>
	<body>
		<br>
		<div id="chartContainer" style="height: 300px; width: 100%;"></div>		
	</body>
</html>