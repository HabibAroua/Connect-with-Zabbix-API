<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2>All services</h2>
            </center>
        </div>
	<div class="row">
         	<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="row">
                            <table  class="table table-striped table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Ip Address</th>
										<th>Actual SLA</th>
                                        <th>Status of the infrastructure</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s = new sla_statusController();
                                        $T = $s->sla_Today();
                                        foreach ($T as $v)
                                        {
                                            $host_name = $v{'host_name'};
                                            $date_s = $v{'date_s'};
                                            $ip_address= $v{'ip_address'};
											$actual_sla = $v{'actual_sla'};
                                            $status_of_the_infrastructure = $v{'status_of_the_infrastructure'};
                                            echo "<tr>";
                                                echo "<td>$host_name</td>";
                                                echo "<td>$date_s</td>";
                                                echo "<td>$ip_address</td>";
												echo "<td>$actual_sla</td>";
                                                echo "<td>$status_of_the_infrastructure</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $("#example").dataTable();
</script>
