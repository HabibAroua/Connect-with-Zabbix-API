<?php

	class value_sla
	{
		private $value;
		
		//$value
		public function getValue()
		{
			return $this->value;
		}
		
		public function setValue($value)
		{
			$this->value=$value;
		}
		
		//nb value_sla
		public function getNbValue_Sla()
		{
			$res=output("select * from value_sla");
            $i=0;
			
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
                $i++;
			}
			return $i;
		}
		
		//add
		public function add()
		{
			return input
			(
				"insert into value_sla values
				(
					$this->value
				);"
			);
		}
		
		//update
		public function update()
		{
			return input(
							"UPDATE value_sla SET  val = $this->value"
						);
		}
		
	}

?>