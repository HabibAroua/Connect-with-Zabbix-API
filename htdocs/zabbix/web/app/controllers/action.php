<?php

	require('../database/connection.php');	
	require('../models/value_sla.php');
	require('../models/service.php');
	require('../models/host_service.php');
	require('../models/sla_status.php');
	require('serviceController.php');
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		switch($action)
		{
			case 'delete_service' :	$serviceController = new serviceController();
									$test = $serviceController->delete($_POST['id']);
									if($test)
									{
										echo "good";
									}
									else
									{
										echo "bad";
									}
			break;
		}
	}
	else
	{
		echo 'Error';
	}

?>