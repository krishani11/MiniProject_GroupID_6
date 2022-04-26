<?php
include("../includes/dbconfig.php");
if(isset($_POST['signup']))
{
	$r_username=$_POST['r_username'];
	if(ctype_alpha($r_username))
	{ 
	    $email=$_POST['r_emailid'];
		$pass=$_POST['r_password'];
		$cpass=$_POST['r_cpassword'];
		if(strlen($pass)>=6 && strlen($pass)<=10)
		{
			if($pass == $cpass)
		    {
		    	$auth=$firebase->getAuth();
			 	$user=$auth->createUserWithEmailAndPassword($email,$pass);
                session_start();
                $_SESSION['r_emailid']=$email;
                $_SESSION['r_password']=$pass;
                $_SESSION['r_username']=$r_username;

                $_SESSION['selected_items']=0;
			    header("Location:profile.php");
		    }
	        else
		    {
	            header("Location:register.php");
	            $_SESSION['selected_items']=0;
            }
        }
        else
        {
    	    header("Location:register.php");
    	    $_SESSION['selected_items']=0;
        } 	    
    }
    else
    	{
    		header("Location:register.php");
    		$_SESSION['selected_items']=0;
    	}
}
else
{
		$email=$_POST['l_emailid'];
		$pass=$_POST['l_password'];
		$auth=$firebase->getAuth();
		$user=$auth->verifyPassword($email,$pass);
		if($user)
		{
			session_start();
			$_SESSION['username'] = $user->id;
			$_SESSION['email_l']= $email;

			$parts = explode('@',$email);
   			$username_id = $parts[0];
			
			$dbref = "profiledb/";
			$user_data_ref = $database->getReference($dbref)->getChild($username_id)->getValue();
			$user_display_name = $user_data_ref['r_username'];
			$calorie_intake = $user_data_ref['cal_intake'];

			$_SESSION['username_id'] = $username_id;
			$_SESSION['r_username']=$user_display_name;
			$_SESSION['cal_intake']=$calorie_intake;
		    
		    header("Location:home.php");
		}
}
?>