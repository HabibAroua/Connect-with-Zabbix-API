<?php

	require('../database/connection.php');	
	require('../models/value_sla.php');
	require('../models/host_service.php');
	require('../models/sla_status.php');
	require('serviceController.php');
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		switch($action)
		{
			case 'delete_service' :	$serviceController = new serviceController();
									if(isset($_POST['id']))
									{
										$test = $serviceController->delete($_POST['id']);
										if($test)
										{
											echo "good";
										}
										else
										{
											echo "bad";
										}	
									}
									else
									{
										echo "bad";
									}
									
			break;
			case 'update_service' : $serviceController = new serviceController();
									$host =new Host_Service();
									
									if((isset($_POST['id'])) && (isset($_POST['host_name'])) && (isset($_POST['ip_address'])))
									{
										$serviceController = new serviceController();
										$h = new Host_Service();
										$h->setHost_name($_POST['host_name']);
										$h->setIp_address($_POST['ip_address']);
										$test = $serviceController->update($_POST['id'],$h);
										if($test)
										{
											echo "good";
										}
										else
										{
											echo "bad";
										}
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