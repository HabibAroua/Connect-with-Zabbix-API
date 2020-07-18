<?php
	
	class sla_statusController
	{
		public function add($sla_status)
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
							'Exception',
							'error'
						)
					  </script>";
			}
		}
		
		public function sla_Today()
		{
			$sla_status = new sla_status();
			return $sla_status->getResultByDate();
		}
	}
?>