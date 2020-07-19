<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Add new status</h2>              
        </div>
		<div class="row">
            <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="POST">
									<div class="form-group">
										<label for="service">Service</label>
										<select name="id_service" id="service" class="form-control" name="id_service">
											<?php
												$s = new serviceController();
												$T = $s->getAllService();
												foreach ($T as $v)
												{
													$id_service = $v{'id'};
													$host_name = $v{'host_name'};
													echo "<option value='$id_service'>$host_name</option>";
												}
											?>
                                        </select>
									</div>
									<div class="form-group">
										<label for="date_s">Date</label>
										<input name="date_s" id="date_s" type= date class="form-control" value="<?php echo date('Y-m-d') ?>" />
                                    </div>
									<div class="form-group">
										<label for="sla">SLA</label>
										<input name="actual_sla" id="sla" type= 'text' class="form-control" required/>
                                    </div>
									<center>
                                        <button name="bt_add_status"  class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-primary">Reset</button>
                                    </center>
								</form>
							</div>
							<div class="col-md-6">
								<img src="picture/host.png" width="100%" height="100%" alt="image" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_POST['bt_add_status']))
	{
        if(date('Y-m-d') == $_POST['date_s'])
        {
            $sla_status =new sla_status();
            $sla_status->setId_service($_POST['id_service']);
            $sla_status->setDate_s($_POST['date_s']);
            $sla_status->setActual_sla($_POST['actual_sla']);
            //echo $sla_status->toString();
            $sla_statusController = new sla_statusController();
            $sla_statusController->add($sla_status);
        }
        else
        {
            $sla_status =new sla_status();
            $sla_status->setId_service($_POST['id_service']);
            $sla_status->setDate_s($_POST['date_s']);
            $sla_status->setActual_sla($_POST['actual_sla']);
            //echo $sla_status->toString();
            $sla_statusController = new sla_statusController();
            $sla_statusController->add_direct($sla_status);
        }
	}
?>