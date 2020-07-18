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
			$res = output
					(
						"select sla_status.date_s, host_service.host_name , host_service.ip_address , sla_status.actual_sla
						from sla_status , host_service
						WHERE sla_status.id_service = host_service.id
						and
						sla_status.date_s = CURRENT_DATE()"
					);
			$i = 0;
			while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$T[$i]=$result = array('date_s'=>$tab[0]."",'host_name'=>$tab[1]."",'ip_address'=>$tab[2]."",'actual_sla'=>$tab[3]."",);
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