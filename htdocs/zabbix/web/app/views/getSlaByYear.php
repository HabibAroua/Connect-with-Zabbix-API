<?php
	$serviceController = new serviceController();
	$sla_statusController = new sla_statusController();
?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2><?php echo $serviceController->findNameById($_GET['id']); ?></h2>
            </center>
        </div>
      <div class="row">
        <div class="col-md-6">
          <div id="pushups"></div>
        </div>
        <div class="col-md-6">
          <?php
            $T = $sla_statusController->getSLAServiceByYear($_GET['id']);
          ?>
          <table  class='table table-striped table-hover' id='example'>
            <thead>
              <th>
                Year
              </th>
              <th>
                SLA
              </th>
            </thead>
            <tbody>
              <?php
                  foreach ($T as $v)
                  {
                    $year = $v{'year'};
                    $avg = $v{'avg'};
					$avg = round($avg, 4);
                    echo "<tr>";
                      echo "<td>$year</td>";
                      echo "<td>$avg</td>";
                    echo "</tr>";
                  }
                ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>s
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
    $sla_statusController->getSLAServiceByYearChart($_GET['id']);
  ?>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $("#example").dataTable();
</script>";