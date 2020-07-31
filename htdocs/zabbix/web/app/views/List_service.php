<script src="js/myScript.js"></script>
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
                                        <th>Id Service</th>
                                        <th>Ip Address</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s = new serviceController();
                                        $T = $s->getAllService();
                                        foreach ($T as $v)
                                        {
                                            $host_name = $v{'host_name'};
                                            $id = $v{'id'};
                                            $ip_address= $v{'ip_address'};
                                            echo "<tr>";
                                                echo "<td>$host_name</td>";
                                                echo "<td>$id</td>";
                                                echo "<td>$ip_address</td>";
                                                echo "<td><button class='glyphicon glyphicon-pencil'></button></td>";
                                                echo "<td><button onClick='will_delete_service($id)' class='glyphicon glyphicon-trash'></button></td>";
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
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $("#example").dataTable();
</script>
<?php
    if(isset($_GET['id']))
    {
        echo "<script>alert('Hello');</script>";
    }
?>