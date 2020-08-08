<?php

	require_once('../web/app/database/connection.php');
	require_once('../web/app/database/query.php');
	require_once('../web/app/models/service.php');
	require_once('../web/app/models/host_service.php');
	require_once('../web/app/controllers/serviceController.php');
	require_once('../security/security.php');
	$s = new serviceController();
	
	echo json_encode($s->getAllService());
?>
