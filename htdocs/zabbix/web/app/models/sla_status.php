<?php

	class sla_status
	{
		private $date_s	;
		private $actual_sla ;
		private $id_service ;
		
		//$date_s
		public function getDate_s()
		{
			return $this->date_s;
		}
		
		public function setDate_s($date_s)
		{
			$this->date_s = $date_s;
		}
		
		//$actual_sla
		public function getActual_sla()
		{
			return $this->actual_sla;
		}
		
		public function setActual_sla($actual_sla)
		{
			$this->actual_sla=$actual_sla;
		}
		
		//$id_service
		public function getId_service()
		{
			return $this->id_service;
		}
		
		public function setId_service($id_service)
		{
			$this->id_service=$id_service;
		}
		
		//add
		public function add()
		{
			return input
				(
				 "insert into sla_status values
					(
						null,
						'$this->date_s',
						'$this->actual_sla',
						$this->id_service
					);"
				);
		}
		
		//getResultByDate
		public function getResultByDate()
		{
			$value_sla = new value_sla();
			echo 'the value is '.$value_sla->getValue_Sla();
			$T= array();
			$res = output
					(
						"select sla_status.date_s, host_service.host_name , host_service.ip_address , sla_status.actual_sla
						from sla_status , host_service
						WHERE sla_status.id_service = host_service.id
						and
						sla_status.date_s = CURRENT_DATE()"
					);
			$i = 0;
			$status_of_the_infrastructure='';
			while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				if ($tab[3]>=$value_sla->getValue_Sla())
				{
					$status_of_the_infrastructure='Up';
				}
				else
				{
					if($tab[3]<$value_sla->getValue_Sla())
					{
						$status_of_the_infrastructure='Down';
					}
				}
				$T[$i]=$result = array('date_s'=>$tab[0]."",'host_name'=>$tab[1]."",'ip_address'=>$tab[2]."",'actual_sla'=>$tab[3]."",'status_of_the_infrastructure'=>$status_of_the_infrastructure,);
                $i++;
			}
			return $T;
		}
		
		public function getNb()
		{
			$res=output
						(
						"
							select sla_status.date_s, host_service.host_name , host_service.ip_address , sla_status.actual_sla
							from sla_status , host_service
							WHERE sla_status.id_service = host_service.id
							and
							sla_status.date_s = CURRENT_DATE() and host_service.id = $this->id_service
						"
						);
            $i=0;
			
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
                $i++;
			}
			return $i;
		}
		
		//update
		public function update()
		{
			try
			{
				input("UPDATE sla_status SET actual_sla= $this->actual_sla where id_service=$this->id_service and date_s=CURRENT_DATE()");
				return true;
			}
			catch (Exception $e)
			{
				return false;
			}
			
		}
		
		//toString
		public function toString()
		{
			return $this->id_service.' '.$this->date_s.' '.$this->actual_sla;
		}
	}
?>