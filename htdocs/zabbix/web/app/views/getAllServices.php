<?php
	if((isset($_GET['id'])) && (isset($_GET['search'])))
	{
		if($_GET['search'] == 'dates')
		{
			require_once('../app/views/chart_service.php');
		}
		else
		{
			if($_GET['search'] == 'years')
			{
				require_once('../app/views/getSlaByYear.php');
			}
		}
	}
	else
	{
		require_once("../app/views/listService.php");		
	}
?>