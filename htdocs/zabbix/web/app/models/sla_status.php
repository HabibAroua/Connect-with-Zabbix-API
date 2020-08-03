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
		
		//getResultByDateToday
		public function getResultByDateToday()
		{
			$value_sla = new value_sla();
			$T= array();
			$res = output
					(
						"select sla_status.date_s, host_service.host_name , host_service.ip_address , sla_status.actual_sla
						from sla_status , host_service
						WHERE sla_status.id_service = host_service.id
						and
						sla_status.date_s = CURRENT_DATE()
						Order By host_service.host_name"
					);
			$i = 0;
			$status_of_the_infrastructure='';
			
			while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$x = $value_sla->getValue_Sla() - $tab[3];
				echo $x.' = '.$value_sla->getValue_Sla().'-'.$tab[3];
				if ($x >=0)
				{
					$status_of_the_infrastructure='Down';
				}
				else
				{
					if($x<0)
					{
						$status_of_the_infrastructure='Up';
					}
				}
				$T[$i]=$result = array('date_s'=>$tab[0]."",'host_name'=>$tab[1]."",'ip_address'=>$tab[2]."",'actual_sla'=>$tab[3]."",'status_of_the_infrastructure'=>$status_of_the_infrastructure,);
                $i++;
			}
			return $T;
		}
		
		//
		public function getResultByDate($d)
		{
			$value_sla = new value_sla();
			$T= array();
			$res = output
					(
						"select sla_status.date_s, host_service.host_name , host_service.ip_address , sla_status.actual_sla
						from sla_status , host_service
						WHERE sla_status.id_service = host_service.id
						and
						sla_status.date_s = '$d'"
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
		
		//
		
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
				input
					(
						"UPDATE sla_status
						SET actual_sla= $this->actual_sla
						where id_service=$this->id_service and date_s=CURRENT_DATE()"
					);
				return true;
			}
			catch (Exception $e)
			{
				return false;
			}
			
		}
		
		//getAllDate
		public function getAllDate()
		{
			$T= array();
			$res=output("select DISTINCT date_s from sla_status");
            $i=0;
			
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$T[$i]=$service = array('date_s'=>$tab[0]."",);
                $i++;
			}
			return $T;
		}
		
		//get All SLA by service
		public function getAllSlaByService($idService)
		{
			$T = array();
			$res = output
					(
					 "
						select host_service.host_name, sla_status.date_s , sla_status.actual_sla
						from sla_status, host_service 
						WHERE host_service.id = sla_status.id_service and host_service.id = $idService
						ORDER By sla_status.date_s
					 "
					 );
			$i=0;
			
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$T[$i]=$service = array('host_name'=>$tab[0]."",'date_s'=>$tab[1]."",'sla_status'=>$tab[2]."",);
                $i++;
			}
			return $T;
		}
		//toString
		public function toString()
		{
			return $this->id_service.' '.$this->date_s.' '.$this->actual_sla;
		}
	}
?>