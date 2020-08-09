<?php
    require('../../json/CService.php');
    echo date('Y-m-d');
    $c = new CService('this_year');
	//print_r ($c->getAllSla());
	$T = $c->getAllSla();
?>
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
       $sla_statusController =new sla_statusController();
       $sla_status =new sla_status();
       if ($sla_status->getNb() == 8)
       {
            echo "<script>
				Swal.fire
				(
					'success',
					'Your SLA data has been inserted',
					'error'
				)
			</script>"; 
       }
       else
       {
            if($sla_status->getNb() == 0)
            {
                $i = 0;
                foreach ($sla_statusController->getSla($T) as $v)
                {
                     //echo $v{'id_service'}.' '.$v{'actual_sla'}.' '.$v{'date_s'}.'<br>';
                     $sla_status->setId_service($v{'id_service'});
                     $sla_status->setDate_s($v{'date_s'});
                     $sla_status->setActual_sla($v{'actual_sla'});
                     // Read the data from a single line
                     $sla_statusController->add($sla_status);
                     $i++;
                }
            }
       }
       
        echo "<script>
				Swal.fire
				(
					'success',
					'Insertion of $i elements are inserted successfully',
					'success'
				)
			</script>"; 
       }
?>
