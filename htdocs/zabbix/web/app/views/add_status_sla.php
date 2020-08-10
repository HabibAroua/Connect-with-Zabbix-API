<?php
    require('../../json/CService.php');
    $c = new CService('this_year');
	$T = $c->getAllSla();
    $sla_statusController =new sla_statusController();
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
                            <div class="col-md-12">
                                <form action="" method="POST" enctype="multipart/form-data">
									<center>
                                        <table  class="table table-striped table-hover" id="example">
                                            <thead>
                                                <tr>
                                                    <th>Id Service</th>
                                                    <th>Date</th>
                                                    <th>SLA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($sla_statusController->getSla($T) as $v)
                                                    {
                                                        $id_service = $v{'id_service'};
                                                        $date_s = $v{'date_s'};
                                                        $actual_sla = $v{'actual_sla'};
                                                        echo "<tr>";
                                                            echo "<td>$id_service</td>";
                                                            echo "<td>$date_s</td>";
                                                            echo "<td>$actual_sla</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button name="bt_add_status"  class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-primary">Reset</button>
                                    </center>
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
	if(isset($_POST['bt_add_status']))
	{
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
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $("#example").dataTable();
</script>