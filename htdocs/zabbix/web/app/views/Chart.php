<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2>All services</h2>
            </center>
        </div>
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
	<script>
	new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'pushups',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { day: 'Ariana', pushups: 99.700, beers: 88 },
    { day: 'Monastir', pushups: 99.700, beers: 56},
    { day: 'Wednesday', pushups: 99.700, beers: 99.800 },
    { day: 'Thursday', pushups: 99.700, beers: 4 },
    { day: 'Friday', pushups: 99.700, beers: 1 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'day',
  parseTime: false,
  // A list of names of data record attributes that contain y-values.
  ykeys: ['pushups','beers'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Pushups','Beers'],
  lineColors: ['#373651','#E65A26']
});
	</script>