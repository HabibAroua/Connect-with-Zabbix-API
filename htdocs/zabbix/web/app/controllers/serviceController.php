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
		
		public function getAllService()
		{
			$s = new Host_Service();
			return ($s->getAllService());
		}
		
		public function delete($id)
		{
			$s = new Host_Service();
			return $s->delete($id);
		}
		
		public function findById($id)
		{
			$s = new Host_Service();
			$s->findById($id);
			return $s;
		}
		
		public function update($id,$s)
		{			
			return $s->update($id);
		}
		
		public function findNameById($id)
		{
			$s = new Host_Service();
			return $s->findNameById($id);
		}
	}
?>