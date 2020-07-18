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
                                        <th>Date</th>
                                        <th>Service</th>
                                        <th>Ip Address</th>
										<th>Actual SLA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s = new sla_statusController();
                                        $T = $s->sla_Today();
                                        foreach ($T as $v)
                                        {
                                            $date_s = $v{'date_s'};
                                            $host_name = $v{'host_name'};
                                            $ip_address= $v{'ip_address'};
											$actual_sla = $v{'actual_sla'};
                                            echo "<tr>";
                                                echo "<td>$date_s</td>";
                                                echo "<td>$host_name</td>";
                                                echo "<td>$ip_address</td>";
												echo "<td>$actual_sla</td>";
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