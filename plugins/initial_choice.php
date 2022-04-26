<?php
include("../includes/dbconfig.php");
$day_cal = $_SESSION['cal_intake'];
$user_key = $_SESSION['username_id'];

$ref= "profiledb/";
$getdata=$database->getReference($ref)->getChild($user_key)->getValue();
$selected_status = $getdata['selected_items'];

$gender = $getdata['p_gender'];
$num_meals = $getdata['p_nm'];


// echo $selected_status;

if ($selected_status=="0"){
    if ($num_meals==3)
    {
        if($gender=="female")
        {
            $breakfast=($day_cal)*0.2;
            $lunch=($day_cal)*0.66;
            $dinner=($day_cal)*0.26;
        }
        elseif($gender=="male")
        {
            $breakfast=($day_cal)*0.21;
            $lunch=($day_cal)*0.32;
            $dinner=($day_cal)*0.32;
        }
        #$database->getReference($ref)->getChild($user_key)->update(array('breakfast_cal' => $breakfast));
        $database->getReference($ref)->getChild($user_key)->update(array('breakfast_cal' => $breakfast, 'lunch_cal' => $lunch, 'dinner_cal' => $dinner));
        $output = shell_exec(__DIR__."/recommend.py $breakfast $lunch $dinner");
        $extras = ["[","]","'"];
        $edit1 = str_replace($extras,"",$output);
        $food_items = explode(';',$edit1);
        #echo $food_items[0];

        $breakfast_items = explode(',',$food_items[0]);
        $lunch_items = explode(',',$food_items[1]);
        $dinner_items = explode(',',$food_items[2]);
    }
    elseif($num_meals==4)
    {
        if($gender=="female")
        {
            $breakfast=($day_cal)*0.15;
            $lunch=($day_cal)*0.5;
            $snacks=($day_cal)*0.15;
            $dinner=($day_cal)*0.2;   
        }
        elseif($gender=="male")
        {
            $breakfast=($day_cal)*0.16;
            $lunch=($day_cal)*0.24;
            $snacks=($day_cal)*0.24;
            $dinner=($day_cal)*0.36;
        }

        $database->getReference($ref)->getChild($user_key)->update(array('breakfast_cal' => $breakfast, 'lunch_cal' => $lunch, 'snacks_cal' => $snacks, 'dinner_cal' => $dinner));
        $output = shell_exec(__DIR__."/recommend.py $breakfast $lunch $dinner $snacks");
        $extras = ["[","]","'"];
        $edit1 = str_replace($extras,"",$output);
        $food_items = explode(';',$edit1);
        #echo $food_items[0];

        $breakfast_items = explode(',',$food_items[0]);
        $lunch_items = explode(',',$food_items[1]);
        $dinner_items = explode(',',$food_items[2]);
        $snacks_items = explode(',',$food_items[3]);   
    }
}
elseif ($selected_status=="1"){


    $breakfast = $getdata['breakfast_cal'];
    $lunch = $getdata['lunch_cal'];
    $dinner = $getdata['dinner_cal'];

    $pref_breakfast_item = (string)$getdata['pref_bf_item'];
    $pref_lunch_item = (string)$getdata['pref_lun_item'];
    $pref_dinner_item = (string)$getdata['pref_din_item'];
    //echo "brakfast->", $pref_breakfast_item;
    if($num_meals==3)
    {
        $output = shell_exec(__DIR__."/compute.py $breakfast $lunch $dinner $pref_breakfast_item $pref_lunch_item $pref_dinner_item");
        $_SESSION['derived_items'] = $output;
        //$database->getReference($ref)->getChild($user_key)->update(array('selected_items' => '2'));
        header("Location: home_dash1.php");
         //echo $output;
        // $arr = json_decode($output);
        // var_dump($arr);

        // $extras = ["[","]","'"];
        // $edit1 = str_replace($extras,"",$output);
        // $food_items = explode(';',$output);
        // echo $food_items;
        // echo $food_items[0];
        // echo $food_items[1];
        // echo $food_items[2];  
        // $user_bf_items=$food_items[0];
        // $user_lunch_items=$food_items[1];
        // $user_dinner_items=$food_items[2];

        //$database->getReference($ref)->getChild($user_key)->update(array('selected_items' => '2'));
        //$selected_status="2";

    }
    elseif($num_meals==4)
    {
        $snacks = $getdata['snacks_cal'];
        $output = shell_exec(__DIR__."/compute.py $breakfast $lunch $dinner $pref_breakfast_item $pref_lunch_item $pref_dinner_item $snacks");
        $_SESSION['derived_items'] = $output;
        //$database->getReference($ref)->getChild($user_key)->update(array('selected_items' => '2'));
        header("Location: home_dash1.php");
        //echo $output;
        // $extras = ["[","]","'"];
        // $edit1 = str_replace($extras,"",$output);
        // $food_items = explode(';',$edit1);
        // #echo $food_items[0];
        // $user_bf_items=$food_items[0];
        // $user_lunch_items=$food_items[1];
        // $user_dinner_items=$food_items[2];

        
        //$selected_status="2";
    }
}
else if ($selected_status=="2")
{
    header("Location:home_dash.php");
}

#echo shell_exec(__DIR__."/recommend.py $day_cal $user_key");
?>