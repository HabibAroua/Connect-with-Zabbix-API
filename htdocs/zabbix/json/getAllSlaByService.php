<?php

	require_once('../web/app/database/connection.php');
	require_once('../web/app/database/query.php');
	require_once('../web/app/models/service.php');
	require_once('../web/app/models/host_service.php');
	require_once('../web/app/models/sla_status.php');
	require_once('../web/app/controllers/sla_statusController.php');
	require_once('../web/app/controllers/serviceController.php');
	require_once('../security/security.php');
	$serviceController = new serviceController();
	$sla_statusController = new sla_statusController();
	
	//echo json_encode($serviceController->getAllService());
	$T = $serviceController->getAllService();
	$i = 0;
	$tab = array();
	foreach ($T as $v)
	{
		$host_name = $v{'host_name'};
		$id = $v{'id'};
		$tab[$i] = $res= array
							(
								'host_name' => $host_name,
								'list' => $sla_statusController->getAllSlaByService_Id($id) ,
							 );
		$i++;
	}
	echo json_encode($tab);
?>