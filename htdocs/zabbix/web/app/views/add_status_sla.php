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
                                <form action="" method="POST" enctype="multipart/form-data">
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
										<input name="actual_sla" id="sla" type= 'text' class="form-control" />
                                    </div>
                                    <input name="file" placeholder="Image" class="form-control" type="File" id="file"/>
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
        if(isset($_FILES['file']))
        {
            $name_file=$_FILES['file']['name'];
            $tmp_file=$_FILES['file']['tmp_name'];
            
            if (($h = fopen($tmp_file, "r")) !== FALSE) 
            {
                // Convert each line into the local $data variable
                $sla_status =new sla_status();
                
                //echo $sla_status->toString();
                $sla_statusController = new sla_statusController();
                
                $i=0;
                while (($data = fgetcsv($h, 1000, ":")) !== FALSE) 
                {
                    $sla_status->setId_service($data[0]);
                    $sla_status->setDate_s($data[1]);
                    $sla_status->setActual_sla($data[2]);
                    // Read the data from a single line
                    $sla_statusController->add_direct($sla_status);
                    $i++;
                }
                
                // Close the file
                fclose($h);
                echo "<script>
							Swal.fire
							(
								'success',
								'Insertion of $i elements are successfully completed',
								'success'
							)
						</script>";
            }
        }
        else
        {
            echo "error";
        }
    }
?>