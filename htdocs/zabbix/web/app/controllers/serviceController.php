<?php
	class serviceController
	{
		public function add($service)
		{
			$test = $service->add();
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
	}
?>