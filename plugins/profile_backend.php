<?php 
include("../includes/dbconfig.php");
session_start();
if(isset($_POST['calculate_cal']))
{
	$gender=$_POST['p_gender'];
	$age=$_POST['p_age'];
	$height=$_POST['p_height'];
	$weight=$_POST['p_weight'];
	$fat=$_POST['p_bfl'];
	$sedlevel=$_POST['p_sl'];
	$nom=$_POST['p_nm'];
	$diet=$_POST['p_dt'];

    $email=$_SESSION["r_emailid"];
    $pass=$_SESSION["r_password"];

    $r_username=$_SESSION["r_username"];

    $selected_items=$_SESSION['selected_items'];
    
	$auth=$firebase->getAuth();
	$user=$auth->getUserByEmail($email);
	// $userInfo=$auth->getUserInfo($user->getUid());
    // $uid=$user->getUid();
    
	if($gender=="female"){
        $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
        $cal_intake = 0;
        if($sedlevel=="sed"){
            $cal_intake = $bmr * 1.2;
        }elseif ($sedlevel=="light"){
            $cal_intake = $bmr * 1.375;
        }elseif($sedlevel=="moderate"){
            $cal_intake = $bmr * 1.55;
        }elseif($sedlevel=="active"){
            $cal_intake = $bmr * 1.725;
        }elseif($sedlevel=="extreme"){
            $cal_intake = $bmr * 1.9;
        }else{
            // error
        }
        

    }else{
        $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        $cal_intake = 0;
        if($sedlevel=="sed"){
            $cal_intake = $bmr * 1.2;
        }elseif ($sedlevel=="light"){
            $cal_intake = $bmr * 1.375;
        }elseif($sedlevel=="moderate"){
            $cal_intake = $bmr * 1.55;
        }elseif($sedlevel=="active"){
            $cal_intake = $bmr * 1.725;
        }elseif($sedlevel=="extreme"){
            $cal_intake = $bmr * 1.9;
        }else{
            // error
        }$weight_const = 1.0*$weight*24;

    }
    $_SESSION['cal_intake']=$cal_intake;
	$data=[
             'p_gender'=>$gender,
             'p_age'=>$age,
             'p_height'=>$height,
             'p_weight'=>$weight,
             'p_bfl'=>$fat,
             'p_sl'=>$sedlevel,
             'p_nm'=>$nom,
             'p_dt'=>$diet,
             'cal_intake'=>$cal_intake,
             'r_username'=>$r_username,
             //'bf_items'=>$_SESSION['bf_items'],
             //'lun_items'=>$_SESSION['lun_items'],
             //'din_items'=>$_SESSION['din_items'],
             //'snacks'=>$_SESSION['bf_items'],
             'selected_items'=>$selected_items
          ];
    
    $parts = explode('@',$email);
    $username_id = $parts[0];
    $_SESSION['username_id'] = $username_id;
	$ref= "profiledb/";
	$postdata=$database->getReference($ref)->getChild($username_id)->set($data);

	if($postdata)
		{
			$_SESSION['status']="Data inserted successfully";
	        header("Location:home.php");
	    }
	else
	{
		$_SESSION['status']="Something went wrong";
	    header("Location:profile.php");
	}
}
?>