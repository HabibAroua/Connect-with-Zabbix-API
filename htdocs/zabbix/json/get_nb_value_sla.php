<?php

	require_once('../web/app/database/connection.php');
	require_once('../web/app/database/query.php');
	require_once('../web/app/models/service.php');
	require_once('../web/app/models/host_service.php');
	require_once('../web/app/models/value_sla.php');
	require_once('../web/app/controllers/value_slaController.php');
	require_once('../web/app/controllers/serviceController.php');
	require_once('../security/security.php');
	try
	{
		$data = json_decode(file_get_contents("php://input"));
		//echo "received data";
		//print_r($data);
		$x= json_encode($data);
		$y = json_decode($x,TRUE);
		if(isset($y['sla']))
		{
			$sla = $y['sla'];
	
			$value_sla= new value_slaController();
	
			$v = new value_sla();
	
			$v->setValue($sla);
		
			if($value_sla->getNbValue_Sla()>0)
			{
				$value_sla->update($v);
			}	
			else
			{
				$value_sla->add($v);
			}
		}
		else
		{
			echo "Error";
		}
	}
	catch(Exception $e)
	{
		echo "Error";
	}
?>