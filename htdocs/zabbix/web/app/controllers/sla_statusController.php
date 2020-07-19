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
	}
?>