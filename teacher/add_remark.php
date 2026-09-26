<?php
$msg ="";
session_start();
include('db.php');
/*$cls = $_POST['cls'];*/
$idm = $_POST['idm'];
/*$teach = $_POST['teacher'];
$des = $_POST['des'];*/
$month = $_POST['month'];
$attend = $_POST['attend'];
$sess = $_SESSION['session'];
$w_d = $_POST['working'];

for ($i=0; $i<count($_POST['idm']); $i++) {
	$absent = $attend[$i];
	$working_days = $w_d;
	/*echo $idm[$i]."->".$teach[$i];*/
	if(isset($attend[$i])){
		$get_des_qry = mysqli_query($con,"SELECT designation FROM teacher WHERE teacher_session='".$_SESSION['session']."' and teacher_id='$idm[$i]'");
		$desig = mysqli_fetch_array($get_des_qry);
	/*echo "insert into tech_absent(tid,desig,month,abs,ses,wd)values('$idm[$i]','$des[$i]','$month[$i]','$attend[$i]','$sess','$w_d')";*/
	$res = mysqli_query($con,"insert into tech_absent(tid,desig,month,abs,ses,wd)values('$idm[$i]','$desig[0]','$month','$attend[$i]','$sess','$w_d')");
	$worked = $working_days-$absent;
	$srch_tch_bsc= mysqli_query($con,"SELECT basic,allow,pf_per,esi_per,current_salary,teacher_name,pf,esi,staff_typ FROM teacher WHERE teacher_session='".$_SESSION['session']."' and teacher_id='$idm[$i]'");
		$check_sal =mysqli_fetch_assoc($srch_tch_bsc);
		
		$teacher_type = $check_sal['staff_typ'];
		$teacher_name = $check_sal['teacher_name'];
		
		$current_salary = $check_sal['current_salary'];
		
		$basic = $check_sal['basic'];
		$allow = $check_sal['allow'];
        $pf_type = $check_sal['pf'];
		$esi_type = $check_sal['esi'];
		$esi_per = $check_sal['esi_per'];
		
		$pf_per = $check_sal['pf_per'];
		$epf_per = $check_sal['epf_per'];
		
		$basic_salary = round($check_sal['basic'])/round($working_days)*($worked);
		//$adjustment = round($check_sal['adjs'])/round($working_days)*round($worked);
		//$da = round($check_sal['da'])/round($working_days)*round($worked);
		$allow_act = round($check_sal['allow'])/round($working_days)*($worked);
		//$cla = round($check_sal['conv'])/round($working_days)*round($worked);
		//$ta = round($check_sal['ta'])/round($working_days)*round($worked);
		$total_amt = round($basic_salary) + round($allow_act);


$salf=round($basic_salary);
$salf_pf = $salf;


if($attend==0)
{
$tot_pf= round($salf * $pf_per/100);
}
else
{
$tot_pf= round($salf * $pf_per/100);
}

if($attend==0)
{
$tot_epf= round($salf_pf * $epf_per/100);
}
else
{
$tot_epf= round($salf_pf * $epf_per/100);
}

$tot_esi = round($total_amt * $esi_per/100);

$grand_total_to_show = round($basic_salary) + round($allow);

$tot_pf_esi = round($tot_esi+$tot_pf);

$payable_amount = round($total_amt) - round($tot_esi + $tot_pf);

		/*echo round($basic_salary)."---DA[".round($da)."]---HRA[".round($hra)."]---CLA[".round($cla)."]---TA[".round($ta)."]---Total[".round($total_amt)."]---ESIC[".round($tot_esic)."]"."---EPF[".round($tot_epf)."]"."---PF[".round($tot_pf)."]"."---ESI[".round($tot_esi)."]//".round($grand_total_to_show)."Current_sal[".$current_salary."]//_Payable Amount[".round($payable_amount)."]_____";
		echo "<br><br>";*/
	/*$res = mysqli_query($con,"insert into tech_absent(tid,desig,month,abs,ses,wd)values('$idm[$i]','$des[$i]','$month[$i]','$attend[$i]','$sess','$w_d')");*/
	
$chk=mysqli_query($con,"SELECT * FROM teacher_sal WHERE teacher='$idm[$i]' AND month='$month' AND session='".$_SESSION['session']."'");
if(mysqli_num_rows($chk)<1)
{
/*echo "insert into teacher_sal(teacher,teacher_name,sal_rec,cur_sal,cl,absent,pf_ded,pf_per,month,session,workingd,esi,esi_per,hra,act_hra,conv,act_conv,it_pt,act_itpt,basic,act_basic,adv,dect,cla,st,allow,ac_allow,pf_type,retcmon,esic_per,esic,epf,da,da_c,ta,ta_c,adjs,adjs_c,ptd,tds,gsalry,gtsal,esi_type,tno)values
('".$idm[$i]."','".$teacher_name."','".round($payable_amount)."','".$current_salary."','0','".$absent."','".round($tot_pf)."','".$pf_per."','".$month."','".$_SESSION['session']."','".$working_days."','".$tot_esi."','".$esi_per."','".round($hra)."','".round($act_hra)."','".round($cla)."','".round($act_cla)."','".round($tot_pf_esi)."','".$it_per."','".round($basic_salary)."','".round($basic)."','0','0','0','".$teacher_type."','0','0','".$pf_type."','0','".$esic_per."','".round($tot_esic)."','".round($tot_epf)."','".$act_da."','".round($da)."','".$act_ta."','".round($ta)."','0','0','0','0','".round($total_amt)."','".round($grand_total_to_show)."','".$esi_type."','".$tech_val."')<br><br>";*/

$query=mysqli_query($con,"insert into teacher_sal(teacher,teacher_name,sal_rec,cur_sal,cl,absent,pf_ded,pf_per,month,session,workingd,esi,esi_per,allow,ac_allow,basic,act_basic,cla,
st,pf_type,retcmon,gsalry,act_working_days)values
('$idm[$i]','".$teacher_name."','".round($payable_amount)."','".$current_salary."','0','".$absent."','".round($tot_pf)."','".$pf_per."','".$month."','".$_SESSION['session']."','".$working_days."','".$tot_esi."','".$esi_per."','".round($allow)."','".round($allow_act)."','".round($basic_salary)."','".round($basic)."','0','".$teacher_type."','".$pf_type."','0','".round($total_amt)."','".$worked."')");
	if($query){
		$msg = "Salary Created! You can check salary Details here <a href='?pageid=salarydetail&&divid=3' target='_blank'>Salary Details</a>";
	}
	else{
		$msg = "Something Went Wrong!";
	}
}

	else
   		{
   
     		$msg = "Salary Already Paid For This Month";
    	
   		}
	}
}

echo $msg;
/*if ($res) {
		echo "Submitted Successfully";
	}
	else{
		echo "Something went Wrong";
	}*/
?>
