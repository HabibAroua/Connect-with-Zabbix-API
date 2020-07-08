<?php

	header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
    header("Content-type:application/json");
    $data = json_decode(file_get_contents("php://input"));
    //echo "received data";
    //print_r($data);
	$x= json_encode($data);
	//echo $x.'<br>';
	$y = json_decode($x,TRUE);
	$user = $y['user'];
	$password = $y['password'];
	$postData = array
    (
            'jsonrpc' => '2.0',
            'method' => 'user.login',
            'params' => array('user' => $user , 'password' => $password),
            'id' => 1,
            'auth' => null
    );

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
        $responseData = json_decode($response, TRUE);
		if(isset($responseData['result']))
		{
			echo $responseData['result']; // You should use json format
		}
		else
		{
			echo "Error";
		}
?>
