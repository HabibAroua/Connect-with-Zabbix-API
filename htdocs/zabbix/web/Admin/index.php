<?php

	require_once('../app/database/connection.php');
	require_once('../app/models/service.php');
	require_once('../app/controllers/serviceController.php');
	$service = new Service();
?>
<!doctype html>
<html>
	<head>
		
	</head>
	<body>
		<?php
			if(isset($_GET['page']))
            {
                switch ($_GET['page'])
                {
					case 'add_service' : require_once('../app/views/addService.php');
                    break;
				}
			}
		?>
	</body>
</html>