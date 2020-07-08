<h1>Add service</h1>
<form method="POST">
<button name="bt_add">Hello</button>
</form>
<?php
	if (isset($_POST['bt_add']))
	{
		$service = new Service();
		$service->setRoot('Safa');
		echo $service->getRoot();
	}
?>