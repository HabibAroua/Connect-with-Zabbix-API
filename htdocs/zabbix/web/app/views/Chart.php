<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2>Actual SLA statistics</h2>
            </center>
        </div>
		<div class="row">
      <div class="col-md-12">
				<div style="height:2000px; weight:100px;" id="pushups"></div>
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