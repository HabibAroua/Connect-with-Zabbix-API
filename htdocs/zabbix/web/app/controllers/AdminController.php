<?php
	class AdminController
	{
		private $session ;
		
		public function __construct()
		{
			$this->session=new Session();
		}
			
		public function login($email,$password)
		{
			
			if(($email = 'admin@zabbix.xom') && ($password == 'admin'))
			{	
				$this->session->connect($email,$password,'http://localhost/zabbix/web/Admin/index.php',3600*48);
			}
			else
			{
				echo "<script>
						Swal.fire
						(
							'error',
							'Email or password are not correct',
							'error'
						)
						</script>";
			}
		}
		
		public function logout()
		{
			
		}
	}
?>