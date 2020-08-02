<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Update Service</h2>              
        </div>
		<div class="row">
            <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group">
									<label for="id">Id service</label>
									<input name="id" id="id" class="form-control" value="<?php echo $s->getId(); ?>" placeholder="PLease Enter Id service" required/>
									<!--<p class="help-block">Help text here.</p>-->
                                </div>
                                <div class="form-group">
                                    <label for="host_name">Host Name</label>
                                    <input name="host_name" id="host_name" class="form-control" value="<?php echo $s->getHost_name(); ?>" placeholder="PLease Enter the Host name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="ip_address">Ip Address</label>
                                    <input name="ip_address" id="ip_address" class="form-control" value="<?php echo $s->getIp_address(); ?>" placeholder="PLease Enter the Ip Address" required/>
                                </div>
                                <center>
                                    <button name="bt_add_service"  class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-primary">Reset</button>
                                </center>
							</div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <img src="picture/host.png" width="100%" height="100%" alt="image" />
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>