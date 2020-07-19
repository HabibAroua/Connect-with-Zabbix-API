<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2>Historical</h2>
            </center>
        </div>
		<div class="row">
            <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <div class="row">
							<?php
								if(isset($_GET['date']))
								{
							?>
							<div class="col-md-6">
                                Tableau
							</div>
                            <div class="col-md-6">
								<center>
								  <h2>Sla analytics</h2>
								</center>
								<div class="row">
									<div class="col-md-12">
										<div id="pushups"></div>
									</div>
								</div>
							</div>
						</div>
						<script src="assets/js/jquery-1.10.2.js"></script>
						<!-- BOOTSTRAP SCRIPTS -->
						<script src="assets/js/bootstrap.min.js"></script>
						<!-- METISMENU SCRIPTS -->
						<script src="assets/js/jquery.metisMenu.js"></script>
						<!-- MORRIS CHART SCRIPTS -->
						<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
						<script src="assets/js/morris/morris.js"></script>
						<!-- CUSTOM SCRIPTS -->
						<script src="assets/js/custom.js"></script>
						<?php
							$sla_statusController = new sla_statusController();
							$sla_statusController->getChart();
						?>	
					</div>
				</div>
			</div>
			<?php
				}
					else
					{
			?>
			<table  class="table table-striped table-hover" id="example">
				<thead>
					<tr>
						<th>Date</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sla_statusController = new sla_statusController();
						$T=$sla_statusController->getAllDate();
						foreach ($T as $v)
						{
							$date_s = $v{'date_s'};
							echo "<tr>";
								echo "<td>$date_s</td>";
								echo "<td><a href='index.php?page=getAllDate&date=$date_s'>Consult</a></td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $("#example").dataTable();
</script>