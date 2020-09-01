<script>
	function changeSelect()
	{
		var x = document.getElementById("mySelect").value;
		location.href = "index.php?period="+x;
	}
</script>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2>News</h2>
            </center>
        </div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
			          <div class="row">
									<div class="form-group">
										<label>Select period</label>
										<select id="mySelect" class="form-control" onchange="changeSelect()">
											<option>Your choice</option>
											<option value="today">Today</option>
											<option value="this_week">This week</option>
											<option value="this_month">This month</option>
											<option value="this_year">This year</option>
											<option value="last_24">Last 24</option>
											<option value="last_7_days">Last 7 days</option>
											<option value="last_30_days">Last 30 days</option>
			                <option value="last_365_days">Last 365 days</option>
			              </select>
			            </div>
								</div>
			          <div class="row">
									<div class="col-md-4">
										<table  class="table table-striped table-hover" id="example">
											<thead>
												<tr>
													<th>Id Service</th>
													<th>Service Name</th>
													<th>SLA</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$T1 = array();
													$i = 0;
													foreach ($sla_statusController->getSla($T) as $v)
													{
														$id_service = $v{'id_service'};
														$service_name = $serviceController->findNameById($id_service);
			                      $date_s = $v{'date_s'};
			                      $actual_sla = $v{'actual_sla'};
														$T1[$i] = $result = array('service_name'=>$service_name,'actual_sla'=>$actual_sla,);
														$i++;
														echo "<tr>";
															echo "<td>$id_service</td>";
															echo "<td>$service_name</td>";
															echo "<td>$actual_sla</td>";
			                      echo "</tr>";
													}
			                  ?>
			                </tbody>
			              </table>
			            </div>
									<div class="col-md-8">
										<div id="pushups"></div>
			            </div>
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
    $sla_statusController->chartFromTab($T1);
  ?>