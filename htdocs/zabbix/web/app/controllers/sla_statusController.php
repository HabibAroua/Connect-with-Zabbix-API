<?php
	
	class sla_statusController
	{
		public function add($sla_status)
		{
			
			
			if($sla_status->getNb() == 0)
			{
				echo "add";
				$test = $sla_status->add();
				if($test)
				{
					echo "<script>
							Swal.fire
							(
								'success',
								'Insertion successfully completed',
								'success'
							)
						  </script>";
				}
				else
				{
					echo "<script>
							Swal.fire
							(
								'error',
								'<Exception>',
								'error'
							)
						  </script>";
				}
				
			}
			else
			{
				if ($sla_status->getNb() >=1)
				{
					$test1 = $sla_status->update();
					echo "test is ".$test1;
					if($test1)
					{
						echo "<script>
							Swal.fire
							(
								'success',
								'Update done',
								'success'
							)
						  </script>";
					}
					else
					{
						echo "<script>
							Swal.fire
							(
								'error',
								'Exception 1',
								'error'
							)
						  </script>";
					}
					
				}
			}
		}
		
		public function sla_Today()
		{
			$sla_status = new sla_status();
			return $sla_status->getResultByDate();
		}
		
		public function getChart()
		{
			$list = "";
			$sla_status = new sla_status();
			$T = $sla_status->getResultByDate();
			foreach ($T as $v)
			{
				$actual_sla = $v{'actual_sla'};
				$val=0;
				if (is_numeric($actual_sla))
				{
					$val = $val + $actual_sla;
				}
				
				$host_name = $v{'host_name'};
				$list =  $list ."{ host: '$host_name', SLA: '99.700', Actual_sla: '$val' },";
				echo "<br> $list";
			}
			$data ="data:
						[
							$list
						],";
			echo
			"<script>
				new Morris.Line
				(
					{
						// ID of the element in which to draw the chart.
						element: 'pushups',
						// Chart data records -- each entry in this array corresponds to a point on
						// the chart.
						$data
						// The name of the data record attribute that contains x-values.
						xkey: 'host',
						parseTime: false,
						// A list of names of data record attributes that contain y-values.
						ykeys: ['SLA','Actual_sla'],
						// Labels for the ykeys -- will be displayed when you hover over the
						// chart.
						labels: ['SLA','Actual_sla'],
						lineColors: ['#373651','#E65A26']
					}
				);
			</script>";
		}
	}
?>