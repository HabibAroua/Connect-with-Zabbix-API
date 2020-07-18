<?php
	class value_slaController
	{
		
		public function getNbValue_Sla()
		{
			$v= new value_sla();
			return $v->getNbValue_Sla();
		}
		
		public function add($value_sla)
		{
			$test = $value_sla->add();
			if($test)
			{
				echo "Insertion successfully completed";
			}
			else
			{
				echo "Error";
			}
		}
		
		public function update($value_sla)
		{
			$test = $value_sla->update();
			if($test)
			{
				echo "Update done";
			}
			else
			{
				echo "Error";
			}
		}
	}
?>