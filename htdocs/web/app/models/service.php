<?php

	class Service
	{
		private $id_service;
		private $root;
		private $status;
		private $problem_time;
		private $sla;
		private $acceptable_sla;
		
		// id_service
		public function getId_service()
		{
			return $this->id_service;
		}
		
		public function setId_service($id_service)
		{
			$this->id_service=$id_service;
		}
		// root
		public function getRoot()
		{
			return $this->root;
		}
		
		public function setRoot($root)
		{
			$this->root=$root;
		}
		// status
		public function getStatus()
		{
			return $this->status;
		}
		
		public function setStatus($status)
		{
			$this->status=$status;
		}
		// problem_time
		public function getProblem_time()
		{
			return $this->problem_time;
		}
		
		public function setProblem_time($problem_time)
		{
			$this->problem_time=$problem_time;
		}
		// sla
		public function getSla()
		{
			return $this->sla;
		}
		
		public function setSla($sla)
		{
			$this->sla=$sla;
		}
		// acceptable_sla
		public function getAcceptable_sla()
		{
			return $this->acceptable_sla;
		}
		
		public function setAcceptable_sla($acceptable_sla)
		{
			$this->acceptable_sla=$acceptable_sla;
		}
		
		// C.R.U.D operation
		public function add()
		{
			
		}
		
	}

?>