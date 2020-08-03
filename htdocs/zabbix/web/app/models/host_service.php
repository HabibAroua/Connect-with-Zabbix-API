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
			$T= array();
			$res=output("select * from host_service Order By host_name");
            $i=0;
			
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
				$T[$i]=$service = array('id'=>$tab[0]."",'host_name'=>$tab[1]."",'ip_address'=>$tab[2]."",);
                $i++;
			}
			return $T;
		}
		
		public function delete($id)
		{
			return input("DELETE FROM host_service WHERE id = '$id' ");
		}
		
		public function findById($id)
		{
			$res=output("select * from host_service where id = $id");
			
            while($tab=$res->fetch(PDO::FETCH_NUM))
            {
                $this->id = $tab['0'];
				$this->host_name = $tab['1'];
				$this->ip_address = $tab['2'];
				//$i++;
			}
		}
		
		//update
		public function update($id)
		{
			$my_host_name=$this->host_name;
			$myip_address=$this->ip_address;
			return input
				(
				 "
				UPDATE host_service SET
					host_name='$my_host_name',
					ip_address='$myip_address'
				WHERE id=$id"
				);
		}
		
		
		//To_String()
		public function toString()
		{
			return "ID : ".$this->id." Host Name : ".$this->host_name." Ip address :".$this->ip_address;
		}
	}
?>