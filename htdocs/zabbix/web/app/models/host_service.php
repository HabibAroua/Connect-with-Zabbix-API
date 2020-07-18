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
		
		public function getAllService()
        {
			$res=output("select * from host_service");
            $i=0;
			
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$T[$i]=$service = array('id'=>$tab[0]."",'host_name'=>$tab[1]."",'ip_address'=>$tab[2]."",);
                $i++;
			}
			return $T;
	}
		
		//To_String()
		public function toString()
		{
			return "ID : ".$this->id." Host Name : ".$this->host_name." Ip address :".$this->ip_address;
		}
	}
?>