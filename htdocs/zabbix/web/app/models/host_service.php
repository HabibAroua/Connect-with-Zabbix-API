<?php
	class Host_Service
	{
		private $id;
		private $host_name;
		private $ip_address;
		
		//$id
		public function getId()
		{
			return $this->id;
		}
		
		public function setId($id)
		{
			$this->id=$id;
		}
		
		//$host_name
		public function getHost_name()
		{
			return $this->host_name;
		}
		
		public function setHost_name($host_name)
		{
			$this->host_name=$host_name;
		}
		//$ip_address
		public function getIp_address()
		{
			return $this->ip_address;
		}
		
		public function setIp_address($ip_address)
		{
			$this->ip_address=$ip_address;
		}
		
		//add
		public function add()
		{
			return input
				(
				 "insert into Host_Service  values
					(
						$this->id,
						'$this->host_name',
						'$this->ip_address'
					);"
				);
		}
		
		//show all
		public function toString()
		{
			return "ID : ".$this->id." Host Name : ".$this->host_name." Ip address :".$this->ip_address;
		}
	}
?>