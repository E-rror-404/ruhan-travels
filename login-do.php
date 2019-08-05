<?php
	include("root/db_connect.php");
	if(isset($_REQUEST['login_type']) && isset($_REQUEST['u_name']) && isset($_REQUEST['u_pass']))
	{	
		$login_type=str_replace("'","",$_REQUEST['login_type']);
		$user_name=str_replace("'","",$_REQUEST['u_name']);
		$user_pass=str_replace("'","",$_REQUEST['u_pass']);			
		if($login_type==1){			
			$log_q=$db->query("SELECT id FROM driver_master WHERE email_id='$user_name' AND password='$user_pass' AND e_d_optn='true'") or die("");
               $log_type='driver';			
		}
		else if($login_type==2){			
			$log_q=$db->query("SELECT id FROM user_details WHERE email_id='$user_name' AND password='$user_pass' AND e_d_optn='true'") or die("");
			 $log_type='user';
		}
		else{
			echo "ta";
		}		
		if($log_q->rowCount()==0){
			echo "il";
		}
		else{
			$log_q_res=$log_q->fetch(PDO::FETCH_ASSOC);
			$admin_id=$log_q_res['id'];
			$login_type=$log_type;
			$expireTime=time()+60*60*24*30;
			setcookie("login",$admin_id,$expireTime);
			setcookie("login2",$login_type,$expireTime);
			echo "sl";
		}		
	}
	else
	{
		echo "ta";
	}
?>