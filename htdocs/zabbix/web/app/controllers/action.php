<?php
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
		switch($action)
		{
			case 'delete_service' : echo "delete a service by Habib Aroua";
			break;
		}
	}

?>