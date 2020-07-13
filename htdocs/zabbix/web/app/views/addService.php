<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Add new Service</h2>              
        </div>
		<div class="row">
            <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Basic Form Examples</h3>
                                <form role="form">
									<div class="form-group">
										<label for="id1">Text Input</label>
										<input id="id1" class="form-control" />
										<p class="help-block">Help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Text Input with Placeholder</label>
                                        <input class="form-control" placeholder="PLease Enter Keyword" />
                                    </div>
                                    <div class="form-group">
                                        <label>Just A Label Control</label>
                                        <p class="form-control-static">info@yourdomain.com</p>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<?php
	if (isset($_POST['bt_add']))
	{
		$service = new Service();
		$service->setRoot('Safa');
		echo $service->getRoot();
	}
?>