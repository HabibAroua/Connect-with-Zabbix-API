<?php

    class Session
    {
        public function connect($email,$password,$page,$s)
        {
		    session_start ();
		    setcookie('email', $email, time() + $s);
		    setcookie('password', $password, time() + $s);
		    $_SESSION['email'] = $email;
		    $_SESSION['password'] = $password;
		    header ("location: http://localhost/zabbix/web/Admin/index.php");
        }
        
        public function afterConnection()
        {
            session_start ();
            if (isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_COOKIE['email']) )
            {
				
            }
            else
            {
                header ('location: login.php');
            }
        }
        
        public function logOut()
        {
            session_start ();
            session_unset ();
            session_destroy ();
            header ('location: login.php');
        }
    }

?>