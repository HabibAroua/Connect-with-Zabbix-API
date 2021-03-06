<?php
	
	class sla_statusController
	{
		public function add($sla_status)
		{
			return $sla_status->add();
				
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
			$list = "";
			$sla_status = new sla_status();
			$T = $sla_status->getSLAServiceByYear($id);
			foreach ($T as $v)
			{
				$avg = $v{'avg'};
				$year = $v{'year'};
				
				$value_sla = new value_sla();
				$value = $value_sla->getValue_Sla();
				
				$list =  $list ."{ Year: '$year', SLA: $value, Actual_sla: '$avg' },";
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
						xkey: 'Year',
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
		
		public function getSla($T)
		{
			$tab = array();
			$i = 0;
			$h = new Host_Service();
			foreach ($h->getAllService() as $v)
			{
				$id_service = $v{'id'};
				$actual_sla=round($T[$v{'id'}]['sla'][0]['sla'],4);
				$date_s = date('Y-m-d');
				$tab[$i]=$service = array
				(
					'id_service'=>$id_service,
					'actual_sla'=>$actual_sla,
					'date_s'=>$date_s,
				);
                $i++;
			}
			return $tab;
		}
		
		public function getAllSlaByService_Id($id)
		{
			$sla_status = new sla_status();
			return $sla_status->getAllSlaByService_Id($id);
		}
		
		public function getAllSlaByService_IdByYear($id)
		{
			$sla_status = new sla_status();
			return $sla_status->getAllServiceId_By_Year($id);
		}
		
		public function chartFromTab($T)
		{
			$list = "";
			
			foreach ($T as $v)
			{
				//service_name'=>$service_name,'actual_sla'
				$service_name = $v{'service_name'};
				$actual_sla = $v{'actual_sla'};
				$value_sla = new value_sla();
				$value = $value_sla->getValue_Sla();
				
				$list =  $list ."{ Service: '$service_name', SLA: $value, Actual_sla: '$actual_sla' },";
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
						xkey: 'Service',
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