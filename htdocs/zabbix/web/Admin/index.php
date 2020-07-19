<?php

	require_once('../app/database/connection.php');
	require_once('../app/database/query.php');
	require_once('../app/models/value_sla.php');
	require_once('../app/models/service.php');
	require_once('../app/models/host_service.php');
	require_once('../app/models/sla_status.php');
	require_once('../app/controllers/serviceController.php');
	require_once('../app/controllers/sla_statusController.php');
	$service = new Service();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php
		require_once('../app/views/header.php');
	?>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Zabbix Admin</a> 
				</div>
				<div style="color: white; padding: 15px 50px 5px 50px; float: right;font-size: 16px;"> 
					Last access : 30 May 2014 &nbsp; 
					<a href="#" class="btn btn-danger square-btn-adjust">
						Logout
					</a> 
				</div>
			</nav>   
			<!-- /. NAV TOP  -->
			<nav class="navbar-default navbar-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="main-menu">
						<li class="text-center">
							<img src="assets/img/find_user.png" class="user-image img-responsive"/>
						</li>					
						<li>
							<a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
						</li>
						<li>
							<a  href="?page=list_service"><i class="fa fa-desktop fa-3x"></i> All Services</a>
						</li>
						<li>
							<a href="index.php?page=add_service"><i class="fa fa-edit fa-3x"></i> Add Host </a>
						</li>
						<li>
							<a href="index.php?page=add_status_sla"><i class="fa fa-edit fa-3x"></i> Change the sla value </a>
						</li>
						<li>
							<a  href="?page=sla_today"><i class="fa fa-qrcode fa-3x"></i> Actaul SLA</a>
						</li>
						<li>
							<a  href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
						</li>	
						<li>
							<a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
						</li>				                
						<li>
							<a href="#">
								<i class="fa fa-sitemap fa-3x"></i> 
								Multi-Level Dropdown
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level">
								<li>
									<a href="#">Second Level Link</a>
								</li>
								<li>
									<a href="#">Second Level Link</a>
								</li>
								<li>
									<a href="#">Second Level Link<span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li>
											<a href="#">Third Level Link</a>
										</li>
										<li>
											<a href="#">Third Level Link</a>
										</li>
										<li>
											<a href="#">Third Level Link</a>
										</li>
									</ul>  
								</li>
							</ul>
						</li>  
						<li>
							<a   href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
						</li>	
					</ul>
				</div>
			</nav>  
			<!-- /. NAV SIDE  -->
		<div id="page-wrapper" >
			<div id="page-inner">
				<?php
					if(isset($_GET['page']))
					{
						switch ($_GET['page'])
						{
							case 'add_service' : require_once('../app/views/addService.php');
							break;
							case 'list_service' : require_once('../app/views/List_service.php');
							break;
							case 'add_status_sla' : require_once('../app/views/add_status_sla.php');
							break;
							case 'sla_today' : require_once('../app/views/sla_today.php');
							break;
							case 'chart' : require_once('../app/views/chart.php');
							break;
						}
					}
				?>
			</div>
			 <!-- /. PAGE WRAPPER  -->
		</div>
		<!-- /. WRAPPER  -->
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="assets/js/jquery-1.10.2.js"></script>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="assets/js/jquery.metisMenu.js"></script>
		<!-- CUSTOM SCRIPTS -->
		<script src="assets/js/custom.js"></script>
	</body>
</html>