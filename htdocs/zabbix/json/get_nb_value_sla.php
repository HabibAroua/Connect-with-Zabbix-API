<?php

	require_once('../web/app/database/connection.php');
	require_once('../web/app/database/query.php');
	require_once('../web/app/models/service.php');
	require_once('../web/app/models/host_service.php');
	require_once('../web/app/models/value_sla.php');
	require_once('../web/app/controllers/value_slaController.php');
	require_once('../web/app/controllers/serviceController.php');
	//require_once('../security/security.php');
	
	$value_sla= new value_slaController();
	
	$v = new value_sla();
	if(isset($_POST['value']))
	{
		$v->setValue($_POST['value']);
		
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
	
?>