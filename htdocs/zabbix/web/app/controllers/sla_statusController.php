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
		
		public function add_direct($sla_status)
		{
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
		
		public function sla_by_date($d)
		{
			$sla_status = new sla_status();
			return $sla_status->getResultByDate($d);
		}
		
		public function sla_Today()
		{
			$sla_status = new sla_status();
			return $sla_status->getResultByDateToday();
		}
		
		public function getChart()
		{
			$list = "";
			$sla_status = new sla_status();
			$T = $sla_status->getResultByDateToday();
			foreach ($T as $v)
			{
				$actual_sla = $v{'actual_sla'};
				$val=0;
				if (is_numeric($actual_sla))
				{
					$val = $val + $actual_sla;
				}
				
				$value_sla = new value_sla();
				$value = $value_sla->getValue_Sla();
				
				$host_name = $v{'host_name'};
				$list =  $list ."{ host: '$host_name', SLA: $value, Actual_sla: '$val' },";
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
		
		public function chart_by_date($d)
		{
			$list = "";
			$sla_status = new sla_status();
			$T = $sla_status->getResultByDate($d);
			foreach ($T as $v)
			{
				$actual_sla = $v{'actual_sla'};
				$val=0;
				if (is_numeric($actual_sla))
				{
					$val = $val + $actual_sla;
				}
				
				$value_sla = new value_sla();
				$value = $value_sla->getValue_Sla();
				
				$host_name = $v{'host_name'};
				$list =  $list ."{ host: '$host_name', SLA: '$value', Actual_sla: '$val' },";
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
		
		public function getAllDate()
		{
			$sla_status = new sla_status();
			return $sla_status->getAllDate();
		}
		
		public function getResultByDate($d)
		{
			$sla_status = new sla_status();
			return $sla_status->getResultByDate($d);
		}
		
		public function getAllSlaByService($idService)
		{
			/*
			$sla_status = new sla_status();
			$T = $sla_status->getAllSlaByService($idService);
			foreach ($T as $v)
			{
				echo $v{'date_s'}.'<br>';
			}*/
			$list = "";
			$sla_status = new sla_status();
			$T = $sla_status->getAllSlaByService($idService);
			foreach ($T as $v)
			{
				$sla_status = $v{'sla_status'};
				$date_s = $v{'date_s'};
				
				$value_sla = new value_sla();
				$value = $value_sla->getValue_Sla();
				
				$host_name = $v{'host_name'};
				$list =  $list ."{ Date: '$date_s', SLA: $value, Actual_sla: '$sla_status' },";
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
						xkey: 'Date',
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
		
		public function getSlaServiceByDate($id)
		{
			$sla_status = new sla_status();
			return $sla_status->getAllSlaByService($id);
		}
		
		public function getSLAServiceByYear($id)
		{
			$sla_status = new sla_status();
			return $sla_status->getSLAServiceByYear($id);
		}
		
		public function getSLAServiceByYearChart($id)
		{
			$sla_status = new sla_status();
			$T = $sla_status->getSLAServiceByYear($id);
		}
	}
?>