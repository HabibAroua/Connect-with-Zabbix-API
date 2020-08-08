<?php

	header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
    header("Content-type:application/json");
	class CService
	{
		public function getAllSla()
		{
			$postData = array
			(
				'jsonrpc' => '2.0',
				'method' => 'service.getsla',
				'params' => array('intervals'=>['from' => 1596754800 , 'to' => 1596803142]),
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
			print_r($T[7]['sla'][0]['sla']);
		}
	}
	$c = new CService();
	$c->getAllSla();
?>
