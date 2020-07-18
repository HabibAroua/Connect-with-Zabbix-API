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
		
		public function add()
		{
			return input
				(
				 "insert into sla_status values
					(
						null,
						'$this->$date_s',
						$this->actual_sla,
						$this->id_service
					);"
				);
		}
	}
?>