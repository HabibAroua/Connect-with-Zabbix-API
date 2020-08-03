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
							<table  class="table table-striped table-hover" id="example">
								<thead>
									<tr>
										<th>Service</th>
										<th>Consult by Dates</th>
                                        <th>Consult by years</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$serviceController = new serviceController();
										$T=$serviceController->getAllService();
										foreach ($T as $v)
										{
											$host_name = $v{'host_name'};
											$id=$v{'id'};
											echo "<tr>";
												echo "<td>$host_name</td>";
												echo "<td><a href='?page=getAllServices&search=dates&id=$id'>Consult</a></td>";
                                                echo "<td><a href='?page=getAllServices&search=years&id=$id'>Consult</a></td>";
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