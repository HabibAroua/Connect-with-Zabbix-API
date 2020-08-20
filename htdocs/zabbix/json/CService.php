<?php
	/*
	 header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
    header("Content-type:application/json");
	 */
	class CService
	{
		private $from;
		private $to;
		
		public function __construct($t)
		{
			switch($t)
			{
				case 'today' : 	$this->from = 1596754800;
								$this->to = 1596803142 ;
				break;
				case 'this_week' : 	$this->from = 1596322800 ;
									$this->to = 1596972487 ;
				break;
				case 'this_month' :	$this->from = 1596236400;
									$this->to = 1596972606;
				break;
				case 'this_year' : 	$this ->from = 1577833200;
									$this->to = 1596972708;
				break;
				case 'last_24' : 	$this->from = 1596886433;
									$this->to = 1596972833;
				break;
				case'last_7_days' : $this->from = 1596368361;
									$this->to = 1596973161;
				break;
				case 'last_30_days' : 	$this->from = 1594381199;
										$this->to = 1596973199;
				break;
				case 'last_365_days' : $this->from = 1594381389;
										$this->to = 1596973389;
				break;
				//default : 	$this->from = 1596754800;
				//			$this->to = 1596803142 ;
				//break;
			}	
		}
		
		//from
		public function getFrom()
		{
			return $this->from;
		}
		
		public function setFrom($from)
		{
			$this->from=$from;
		}
		
		
		//to
		public function getTo()
		{
			return $this->to;
		}
		
		public function setTo($to)
		{
			$this->to=$this;
		}
		
		//getAllSlaValue
		public function getAllSla()
		{
			$postData = array
			(
				'jsonrpc' => '2.0',
				'method' => 'service.getsla',
				'params' => array('intervals'=>['from' => $this->from , 'to' => $this->to]),
				'auth' => '70a11a43d883852779a206cc7c396793',
				'id' => 1,
			);
			//echo json_encode($postData);
			// Setup cURL
			$ch = curl_init('http://51.178.169.200/zabbix/api_jsonrpc.php');
			curl_setopt_array
			(
				$ch, array
				(
					CURLOPT_POST => TRUE,
					CURLOPT_RETURNTRANSFER => TRUE,
					CURLOPT_HTTPHEADER => array
					(
						//'Authorization: '.$authToken,
						'Content-Type: application/json'
					),
					CURLOPT_POSTFIELDS => json_encode($postData)
				)
			);
			// Send the request
			$response = curl_exec($ch);
		
			// Check for errors
			if($response === FALSE)
			{
				die(curl_error($ch));
				echo "Error";
			}
			   
			// Decode the response
			//print_r($response);
			$responseData = json_decode($response, TRUE);
			//print_r($responseData);
			$T = $responseData['result'];
			//print_r($T[7]['sla'][0]['sla']);
			return $T;
		}
		
	}
?>
