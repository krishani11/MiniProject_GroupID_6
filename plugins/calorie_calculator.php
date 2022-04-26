<?php

if (isset($_POST['calculate_cal']))
{
    $user_gender = $_POST['p_gender'];
    $user_age = $_POST['p_age'];
    $user_height = $_POST['p_height'];
    $user_weight = $_POST['p_weight'];
    $user_bodyfat = $_POST['p_bfl'];
    $user_sedentary = $_POST['p_sl'];
    $user_meals_num = $_POST['p_nm'];
    $user_diet_type = $_POST['p_dt'];

    if($user_gender=="female"){
        $bmr = (10 * $user_age) + (6.25 * $user_height) - (5 * $user_age) - 161;
        $cal_intake = 0;
        if($user_sedentary=="sed"){
            $cal_intake = $bmr * 1.2;
        }elseif ($user_sedentary=="light"){
            $cal_intake = $bmr * 1.375;
        }elseif($user_sedentary=="moderate"){
            $cal_intake = $bmr * 1.55;
        }elseif($user_sedentary=="active"){
            $cal_intake = $bmr * 1.725;
        }elseif($user_sedentary=="extreme"){
            $cal_intake = $bmr * 1.9;
        }else{
            // error
        }
        

    }else{
        $bmr = (10 * $user_age) + (6.25 * $user_height) - (5 * $user_age) + 5;
        $cal_intake = 0;
        if($user_sedentary=="sed"){
            $cal_intake = $bmr * 1.2;
        }elseif ($user_sedentary=="light"){
            $cal_intake = $bmr * 1.375;
        }elseif($user_sedentary=="moderate"){
            $cal_intake = $bmr * 1.55;
        }elseif($user_sedentary=="active"){
            $cal_intake = $bmr * 1.725;
        }elseif($user_sedentary=="extreme"){
            $cal_intake = $bmr * 1.9;
        }else{
            // error
        }$weight_const = 1.0*$user_weight*24;

    }

    //echo $cal_intake;

}


?>